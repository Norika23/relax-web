<?php
namespace App\Http\Controllers\Demo\Admin;
use App\Enums\ReservationSource; use App\Enums\ReservationStatus; use App\Http\Controllers\Controller; use App\Http\Requests\ReservationRequest; use App\Models\Reservation; use App\Services\ReservationService; use Illuminate\Http\RedirectResponse; use Illuminate\Http\Request; use Illuminate\View\View;
class ReservationController extends Controller {
 private function find(int $id):Reservation{return Reservation::where('shop_id',auth()->user()->shop_id)->findOrFail($id);} private function data():array{$shop=auth()->user()->shop;return ['services'=>$shop->services()->where('is_active',true)->orderBy('display_order')->get(),'staffs'=>$shop->staffs()->where('is_active',true)->with('services:id')->orderBy('display_order')->get()];}
 public function index(Request $r):View{$q=Reservation::with(['service','staff'])->where('shop_id',auth()->user()->shop_id)->orderBy('starts_at');if($r->filter==='today')$q->whereBetween('starts_at',[now()->startOfDay()->utc(),now()->endOfDay()->utc()]);if($r->filter==='week')$q->whereBetween('starts_at',[now()->startOfWeek()->utc(),now()->endOfWeek()->utc()]);return view('demo.admin.reservations.index',['reservations'=>$q->paginate(30)]);}
 public function create():View{return view('demo.admin.reservations.form',$this->data()+['reservation'=>null]);}
 public function store(ReservationRequest $r,ReservationService $service):RedirectResponse{$reservation=$service->create(auth()->user()->shop,$r->validated(),ReservationSource::tryFrom($r->input('source'))??ReservationSource::Phone);return redirect()->route('demo.admin.reservations.show',$reservation)->with('success','予約を追加しました。');}
 public function show(int $reservation):View{return view('demo.admin.reservations.show',['reservation'=>$this->find($reservation)->load(['service','staff'])]);}
 public function edit(int $reservation):View{return view('demo.admin.reservations.form',$this->data()+['reservation'=>$this->find($reservation)]);}
 public function update(ReservationRequest $r,int $reservation,ReservationService $service):RedirectResponse{$item=$service->update($this->find($reservation),$r->validated());return redirect()->route('demo.admin.reservations.show',$item)->with('success','予約を変更しました。');}
 public function status(Request $r,int $reservation):RedirectResponse{$value=$r->validate(['status'=>['required','in:'.collect(ReservationStatus::cases())->pluck('value')->join(',')]])['status'];$this->find($reservation)->update(['status'=>$value]);return back()->with('success','ステータスを変更しました。');}
}
