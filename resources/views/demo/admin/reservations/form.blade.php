@extends('demo.admin.layout')
@section('title', $reservation ? '予約変更' : '手動予約')
@section('content')
<div class="admin-title"><div><p>MANUAL RESERVATION</p><h1>{{ $reservation ? '予約を変更' : '予約を追加' }}</h1></div></div>
<form class="admin-card admin-form" method="post" action="{{ $reservation ? route('demo.admin.reservations.update', $reservation) : route('demo.admin.reservations.store') }}">
    @csrf
    @if($reservation) @method('put') @endif
    <div class="field-grid">
        <label>メニュー<select class="booking-input" name="service_id" required>
            @foreach($services as $service)<option value="{{ $service->id }}" @selected(old('service_id', $reservation?->service_id) == $service->id)>{{ $service->name }}（{{ number_format($service->price) }}円）</option>@endforeach
        </select></label>
        <label>スタッフ<select class="booking-input" name="staff_id" required>
            @foreach($staffs as $staff)<option value="{{ $staff->id }}" @selected(old('staff_id', $reservation?->staff_id) == $staff->id)>{{ $staff->name }}</option>@endforeach
        </select></label>
        <label>開始日時<input class="booking-input" type="datetime-local" name="starts_at" value="{{ old('starts_at', $reservation?->starts_at?->setTimezone(config('reservation.timezone'))->format('Y-m-d\TH:i')) }}" required></label>
        <label>予約経路<select class="booking-input" name="source"><option value="phone" @selected(old('source', $reservation?->source?->value ?? 'phone') === 'phone')>電話</option><option value="walk_in" @selected(old('source', $reservation?->source?->value) === 'walk_in')>来店</option><option value="admin" @selected(old('source', $reservation?->source?->value) === 'admin')>管理画面</option></select></label>
        <label>お名前<input class="booking-input" name="customer_name" value="{{ old('customer_name', $reservation?->customer_name) }}" required></label>
        <label>電話番号<input class="booking-input" name="phone" value="{{ old('phone', $reservation?->phone) }}" required></label>
        <label>メール<input class="booking-input" type="email" name="email" value="{{ old('email', $reservation?->email) }}" required></label>
        <label>備考<textarea class="booking-input" name="notes">{{ old('notes', $reservation?->notes) }}</textarea></label>
    </div>
    <button class="booking-primary">{{ $reservation ? '変更を保存' : '予約を追加' }}</button>
</form>
@endsection
