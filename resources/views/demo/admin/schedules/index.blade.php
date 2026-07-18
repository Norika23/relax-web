@extends('demo.admin.layout')
@section('title', '営業時間・勤務時間')
@section('content')
@php($days = ['日', '月', '火', '水', '木', '金', '土'])
<div class="admin-title"><div><p>SCHEDULES</p><h1>営業時間・勤務時間</h1></div></div>
<section class="admin-card">
    <h2>店舗営業時間</h2>
    <form class="schedule-form" method="post" action="{{ route('demo.admin.schedules.business') }}">
        @csrf @method('put')
        @foreach($days as $index => $day)
            @php($hour = $hours->get($index))
            <div><strong>{{ $day }}</strong><input type="time" name="days[{{ $index }}][opens_at]" value="{{ substr($hour?->opens_at ?? '10:00', 0, 5) }}"><span>〜</span><input type="time" name="days[{{ $index }}][closes_at]" value="{{ substr($hour?->closes_at ?? '20:00', 0, 5) }}"><label><input type="checkbox" name="days[{{ $index }}][is_closed]" value="1" @checked($hour?->is_closed)>定休日</label></div>
        @endforeach
        <button class="booking-primary">営業時間を保存</button>
    </form>
</section>
@foreach($staffs as $staff)
    <details class="admin-card admin-details"><summary>{{ $staff->name }}の勤務時間</summary>
        <form class="schedule-form" method="post" action="{{ route('demo.admin.schedules.staff', $staff) }}">
            @csrf @method('put')
            @foreach($days as $index => $day)
                @php($hour = $staff->workingHours->firstWhere('weekday', $index))
                <div><strong>{{ $day }}</strong><input type="time" name="days[{{ $index }}][starts_at]" value="{{ substr($hour?->starts_at ?? '10:00', 0, 5) }}"><span>〜</span><input type="time" name="days[{{ $index }}][ends_at]" value="{{ substr($hour?->ends_at ?? '18:00', 0, 5) }}"><label><input type="checkbox" name="days[{{ $index }}][is_day_off]" value="1" @checked($hour?->is_day_off)>休み</label></div>
            @endforeach
            <button class="booking-primary">勤務時間を保存</button>
        </form>
    </details>
@endforeach
@endsection
