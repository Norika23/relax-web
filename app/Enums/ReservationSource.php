<?php

namespace App\Enums;

enum ReservationSource: string
{
    case Web = 'web';
    case Phone = 'phone';
    case WalkIn = 'walk_in';
    case Admin = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::Web => 'Web', self::Phone => '電話',
            self::WalkIn => '来店', self::Admin => '管理画面',
        };
    }
}
