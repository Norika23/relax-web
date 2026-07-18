<?php

return [
    'slot_interval_minutes' => (int) env('RESERVATION_SLOT_INTERVAL', 30),
    'timezone' => env('APP_TIMEZONE', 'Asia/Tokyo'),
];
