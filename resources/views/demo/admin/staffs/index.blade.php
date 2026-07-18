@extends('demo.admin.layout')
@section('title', 'スタッフ管理')
@section('content')
<div class="admin-title"><div><p>STAFF</p><h1>スタッフ管理</h1></div></div>
<section class="admin-card"><h2>新しいスタッフ</h2>@include('demo.admin.staffs.form', ['staff' => null])</section>
@foreach($staffs as $staff)
    <details class="admin-card admin-details"><summary>{{ $staff->name }}</summary>
        @include('demo.admin.staffs.form', ['staff' => $staff])
        <form method="post" action="{{ route('demo.admin.staffs.destroy', $staff) }}">@csrf @method('delete')<button class="admin-danger">非表示にする</button></form>
    </details>
@endforeach
@endsection
