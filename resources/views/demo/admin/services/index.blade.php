@extends('demo.admin.layout')
@section('title', 'メニュー管理')
@section('content')
<div class="admin-title"><div><p>SERVICES</p><h1>メニュー管理</h1></div></div>
<section class="admin-card"><h2>新しいメニュー</h2>@include('demo.admin.services.form', ['service' => null])</section>
@foreach($services as $service)
    <details class="admin-card admin-details"><summary>{{ $service->name }}　{{ number_format($service->price) }}円</summary>
        @include('demo.admin.services.form', ['service' => $service])
        <form method="post" action="{{ route('demo.admin.services.destroy', $service) }}">@csrf @method('delete')<button class="admin-danger">非表示にする</button></form>
    </details>
@endforeach
@endsection
