<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvailabilityRequest;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Shop;
use App\Models\Staff;
use App\Services\AvailabilityService;
use App\Services\ReservationService;
use Carbon\CarbonImmutable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReservationController extends Controller
{
    private function shop(): Shop { return Shop::where('name','テスト整体院')->firstOrFail(); }
    public function index(): View { $shop=$this->shop(); return view('demo.reservation.index',['shop'=>$shop,'services'=>$shop->services()->where('is_active',true)->orderBy('display_order')->get()]); }
    public function staffs(int $service): JsonResponse { $shop=$this->shop(); $service=Service::where('shop_id',$shop->id)->where('is_active',true)->findOrFail($service); return response()->json($service->staffs()->where('is_active',true)->where('can_accept_reservations',true)->orderBy('display_order')->get(['staffs.id','name','bio','nomination_fee'])); }
    public function slots(AvailabilityRequest $request, AvailabilityService $availability): JsonResponse { $shop=$this->shop(); $service=Service::where('shop_id',$shop->id)->findOrFail($request->integer('service_id')); $staff=Staff::where('shop_id',$shop->id)->findOrFail($request->integer('staff_id')); return response()->json($availability->slots($shop,$service,$staff,(string)$request->string('date'))); }
    public function confirm(ReservationRequest $request): View { $data=$request->validated(); $shop=$this->shop(); $service=Service::where('shop_id',$shop->id)->findOrFail($data['service_id']); $staff=Staff::where('shop_id',$shop->id)->findOrFail($data['staff_id']); $start=CarbonImmutable::parse($data['starts_at'])->setTimezone($shop->timezone); return view('demo.reservation.confirm',compact('data','service','staff','start')); }
    public function store(ReservationRequest $request, ReservationService $creator): RedirectResponse { $reservation=$creator->create($this->shop(),$request->validated()); session(['last_reservation_id'=>$reservation->id]); return redirect()->route('demo.reservation.complete'); }
    public function complete(): View { $reservation=Reservation::with(['shop','service','staff'])->findOrFail(session('last_reservation_id')); return view('demo.reservation.complete',compact('reservation')); }
}
