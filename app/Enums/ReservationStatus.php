<?php

namespace App\Enums;

enum ReservationStatus: string
{
    case Confirmed = 'confirmed';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
    case NoShow = 'no_show';

    public function label(): string
    {
        return match ($this) {
            self::Confirmed => '予約確定', self::Completed => '完了',
            self::Cancelled => 'キャンセル', self::NoShow => '無断キャンセル',
        };
    }
}
