<?php

namespace App\Services;

use App\Enums\ReservationStatus;
use App\Models\BlockedTime;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Shop;
use App\Models\Staff;
use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class AvailabilityService
{
    public function slots(Shop $shop, Service $service, Staff $staff, string $date): Collection
    {
        $timezone = $shop->timezone ?: config('reservation.timezone');
        $day = CarbonImmutable::parse($date, $timezone)->startOfDay();
        $business = $shop->businessHours()->where('weekday', $day->dayOfWeek)->first();
        $working = $staff->workingHours()->where('weekday', $day->dayOfWeek)->first();
        if (! $business || $business->is_closed || ! $working || $working->is_day_off || ! $staff->services()->whereKey($service->id)->exists()) return collect();

        $open = CarbonImmutable::parse($day->toDateString().' '.$business->opens_at, $timezone);
        $close = CarbonImmutable::parse($day->toDateString().' '.$business->closes_at, $timezone);
        $workStart = CarbonImmutable::parse($day->toDateString().' '.$working->starts_at, $timezone);
        $workEnd = CarbonImmutable::parse($day->toDateString().' '.$working->ends_at, $timezone);
        $cursor = $open->greaterThan($workStart) ? $open : $workStart;
        $limit = $close->lessThan($workEnd) ? $close : $workEnd;
        $minutes = $service->duration_minutes + $service->buffer_minutes;
        $interval = $shop->slot_interval_minutes ?: config('reservation.slot_interval_minutes');
        $slots = collect();
        while ($cursor->addMinutes($minutes)->lessThanOrEqualTo($limit)) {
            $end = $cursor->addMinutes($minutes);
            if ($cursor->isFuture() && $this->isAvailable($shop, $service, $staff, $cursor, $end)) {
                $slots->push(['value'=>$cursor->utc()->toIso8601String(),'label'=>$cursor->format('H:i')]);
            }
            $cursor = $cursor->addMinutes($interval);
        }
        return $slots;
    }

    public function isAvailable(Shop $shop, Service $service, Staff $staff, CarbonImmutable $start, ?CarbonImmutable $end = null, ?int $ignoreReservationId = null): bool
    {
        if ($service->shop_id !== $shop->id || $staff->shop_id !== $shop->id || ! $service->is_active || ! $staff->is_active || ! $staff->can_accept_reservations) return false;
        if (! $staff->services()->whereKey($service->id)->exists()) return false;
        $timezone = $shop->timezone ?: config('reservation.timezone');
        $localStart = $start->setTimezone($timezone); $end ??= $start->addMinutes($service->duration_minutes + $service->buffer_minutes); $localEnd = $end->setTimezone($timezone);
        $business = $shop->businessHours()->where('weekday',$localStart->dayOfWeek)->first();
        $working = $staff->workingHours()->where('weekday',$localStart->dayOfWeek)->first();
        if (! $business || $business->is_closed || ! $working || $working->is_day_off || $localStart->toDateString() !== $localEnd->toDateString()) return false;
        $day = $localStart->toDateString();
        $open=CarbonImmutable::parse("$day {$business->opens_at}",$timezone); $close=CarbonImmutable::parse("$day {$business->closes_at}",$timezone);
        $workStart=CarbonImmutable::parse("$day {$working->starts_at}",$timezone); $workEnd=CarbonImmutable::parse("$day {$working->ends_at}",$timezone);
        if ($localStart->lt($open) || $localEnd->gt($close) || $localStart->lt($workStart) || $localEnd->gt($workEnd)) return false;
        $startUtc=$start->utc(); $endUtc=$end->utc();
        $reserved = Reservation::where('staff_id',$staff->id)->where('status','!=',ReservationStatus::Cancelled->value)
            ->when($ignoreReservationId,fn($q)=>$q->where('id','!=',$ignoreReservationId))->where('starts_at','<',$endUtc)->where('ends_at','>',$startUtc)->exists();
        if ($reserved) return false;
        return ! BlockedTime::where('shop_id',$shop->id)->where(fn($q)=>$q->whereNull('staff_id')->orWhere('staff_id',$staff->id))
            ->where('starts_at','<',$endUtc)->where('ends_at','>',$startUtc)->exists();
    }
}
