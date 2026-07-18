<?php

namespace App\Http\Controllers\Demo\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\BusinessHour;
use App\Models\Staff;
use App\Models\StaffWorkingHour;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        $shop = auth()->user()->shop;

        return view('demo.admin.schedules.index', [
            'shop' => $shop,
            'hours' => $shop->businessHours()->get()->keyBy('weekday'),
            'staffs' => $shop->staffs()->with('workingHours')->get(),
        ]);
    }

    public function business(ScheduleRequest $request): RedirectResponse
    {
        $shop = auth()->user()->shop;

        foreach (range(0, 6) as $day) {
            BusinessHour::updateOrCreate(
                ['shop_id' => $shop->id, 'weekday' => $day],
                [
                    'opens_at' => $request->input("days.$day.opens_at"),
                    'closes_at' => $request->input("days.$day.closes_at"),
                    'is_closed' => $request->boolean("days.$day.is_closed"),
                ],
            );
        }

        return back()->with('success', '営業時間を更新しました。');
    }

    public function staff(ScheduleRequest $request, int $staff): RedirectResponse
    {
        $item = Staff::where('shop_id', auth()->user()->shop_id)->findOrFail($staff);

        foreach (range(0, 6) as $day) {
            StaffWorkingHour::updateOrCreate(
                ['staff_id' => $item->id, 'weekday' => $day],
                [
                    'starts_at' => $request->input("days.$day.starts_at"),
                    'ends_at' => $request->input("days.$day.ends_at"),
                    'is_day_off' => $request->boolean("days.$day.is_day_off"),
                ],
            );
        }

        return back()->with('success', '勤務時間を更新しました。');
    }
}
