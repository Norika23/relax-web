<?php

namespace App\Http\Controllers\Demo\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $shop = auth()->user()->shop;
        $base = Reservation::with(['service', 'staff'])->where('shop_id', $shop->id);

        return view('demo.admin.dashboard', [
            'today' => (clone $base)
                ->whereBetween('starts_at', [now()->startOfDay()->utc(), now()->endOfDay()->utc()])
                ->orderBy('starts_at')->get(),
            'week' => (clone $base)
                ->whereBetween('starts_at', [now()->startOfWeek()->utc(), now()->endOfWeek()->utc()])
                ->orderBy('starts_at')->get(),
            'shop' => $shop,
        ]);
    }
}
