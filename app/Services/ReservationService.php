<?php

namespace App\Services;

use App\Enums\ReservationSource;
use App\Enums\ReservationStatus;
use App\Jobs\SendReservationNotifications;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Shop;
use App\Models\Staff;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ReservationService
{
    public function __construct(private AvailabilityService $availability) {}

    public function create(Shop $shop, array $data, ReservationSource $source = ReservationSource::Web): Reservation
    {
        $reservation = DB::transaction(function () use ($shop,$data,$source) {
            $staff = Staff::where('shop_id',$shop->id)->lockForUpdate()->findOrFail($data['staff_id']);
            $service = Service::where('shop_id',$shop->id)->findOrFail($data['service_id']);
            $start = CarbonImmutable::parse($data['starts_at'])->utc();
            $end = $start->addMinutes($service->duration_minutes + $service->buffer_minutes);
            if (! $this->availability->isAvailable($shop,$service,$staff,$start,$end)) {
                throw ValidationException::withMessages(['starts_at'=>'選択された時間は予約できません。別の時間をお選びください。']);
            }
            return Reservation::create([
                'shop_id'=>$shop->id,'service_id'=>$service->id,'staff_id'=>$staff->id,
                'customer_name'=>$data['customer_name'],'phone'=>$data['phone'],'email'=>$data['email'],
                'starts_at'=>$start,'ends_at'=>$end,'service_price'=>$service->price,'nomination_fee'=>$staff->nomination_fee,
                'total_price'=>$service->price+$staff->nomination_fee,'status'=>ReservationStatus::Confirmed,
                'notes'=>$data['notes'] ?? null,'source'=>$source,'cancellation_token'=>(string) Str::uuid(),
            ]);
        }, 3);
        try { SendReservationNotifications::dispatch($reservation->id)->afterCommit(); } catch (\Throwable $e) { report($e); }
        return $reservation->load(['service','staff','shop']);
    }

    public function update(Reservation $reservation, array $data): Reservation
    {
        return DB::transaction(function () use ($reservation,$data) {
            $staff=Staff::where('shop_id',$reservation->shop_id)->lockForUpdate()->findOrFail($data['staff_id']);
            $service=Service::where('shop_id',$reservation->shop_id)->findOrFail($data['service_id']);
            $start=CarbonImmutable::parse($data['starts_at'])->utc(); $end=$start->addMinutes($service->duration_minutes+$service->buffer_minutes);
            if(! $this->availability->isAvailable($reservation->shop,$service,$staff,$start,$end,$reservation->id)) throw ValidationException::withMessages(['starts_at'=>'選択された時間は予約できません。']);
            $changes=['service_id'=>$service->id,'staff_id'=>$staff->id,'customer_name'=>$data['customer_name'],'phone'=>$data['phone'],'email'=>$data['email'],'starts_at'=>$start,'ends_at'=>$end,'service_price'=>$service->price,'nomination_fee'=>$staff->nomination_fee,'total_price'=>$service->price+$staff->nomination_fee,'notes'=>$data['notes']??null];
            if (isset($data['source'])) $changes['source']=$data['source'];
            $reservation->update($changes);
            return $reservation->fresh(['service','staff','shop']);
        },3);
    }
}
