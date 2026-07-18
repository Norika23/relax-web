@extends('demo.admin.layout')
@section('title', '予約不可時間')
@section('content')
<div class="admin-title"><div><p>BLOCKED TIMES</p><h1>予約不可時間</h1></div></div>
<section class="admin-card">
    <h2>休憩・外出・臨時休業を追加</h2>
    <form class="admin-form" method="post" action="{{ route('demo.admin.blocks.store') }}">
        @csrf
        <div class="field-grid">
            <label>対象<select class="booking-input" name="staff_id"><option value="">店舗全体</option>@foreach($staffs as $staff)<option value="{{ $staff->id }}">{{ $staff->name }}</option>@endforeach</select></label>
            <label>理由<input class="booking-input" name="reason"></label>
            <label>開始<input class="booking-input" type="datetime-local" name="starts_at" required></label>
            <label>終了<input class="booking-input" type="datetime-local" name="ends_at" required></label>
        </div>
        <button class="booking-primary">追加</button>
    </form>
</section>
<section class="admin-card">
    <div class="admin-table-wrap"><table class="admin-table">
        <thead><tr><th>対象</th><th>日時</th><th>理由</th><th></th></tr></thead>
        <tbody>@forelse($blocks as $block)<tr>
            <td>{{ $block->staff?->name ?? '店舗全体' }}</td>
            <td>{{ $block->starts_at->setTimezone(config('app.timezone'))->format('n/j H:i') }}〜{{ $block->ends_at->setTimezone(config('app.timezone'))->format('n/j H:i') }}</td>
            <td>{{ $block->reason }}</td>
            <td><form method="post" action="{{ route('demo.admin.blocks.destroy', $block) }}">@csrf @method('delete')<button class="admin-danger">削除</button></form></td>
        </tr>@empty<tr><td colspan="4">登録はありません。</td></tr>@endforelse</tbody>
    </table></div>
</section>
@endsection
