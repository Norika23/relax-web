@extends('demo.admin.layout')
@section('title', '予約詳細')
@section('content')
<div class="admin-title"><div><p>RESERVATION #{{ $reservation->id }}</p><h1>予約詳細</h1></div><a class="admin-primary" href="{{ route('demo.admin.reservations.edit', $reservation) }}">予約を変更</a></div>
<section class="admin-card confirm-card">
    <dl>
        <div><dt>日時</dt><dd>{{ $reservation->starts_at->setTimezone(config('reservation.timezone'))->format('Y年n月j日 H:i') }}〜{{ $reservation->ends_at->setTimezone(config('reservation.timezone'))->format('H:i') }}</dd></div>
        <div><dt>お客さま</dt><dd>{{ $reservation->customer_name }}</dd></div><div><dt>電話</dt><dd>{{ $reservation->phone }}</dd></div><div><dt>メール</dt><dd>{{ $reservation->email }}</dd></div>
        <div><dt>メニュー</dt><dd>{{ $reservation->service->name }}</dd></div><div><dt>スタッフ</dt><dd>{{ $reservation->staff->name }}</dd></div><div><dt>合計</dt><dd>{{ number_format($reservation->total_price) }}円</dd></div><div><dt>備考</dt><dd>{{ $reservation->notes ?: 'なし' }}</dd></div>
    </dl>
    <form method="post" action="{{ route('demo.admin.reservations.status', $reservation) }}">@csrf @method('patch')
        <label>ステータス<select class="booking-input" name="status">@foreach(\App\Enums\ReservationStatus::cases() as $status)<option value="{{ $status->value }}" @selected($reservation->status === $status)>{{ $status->label() }}</option>@endforeach</select></label>
        <button class="booking-primary">ステータスを保存</button>
    </form>
</section>
@endsection
