<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')｜予約管理</title>
    @vite(['resources/css/reservation.css', 'resources/css/admin.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
<header class="admin-header">
    <a href="{{ route('demo.admin.dashboard') }}"><strong>テスト整体院</strong><small>予約管理</small></a>
    <details><summary>メニュー</summary><nav>
        <a href="{{ route('demo.admin.dashboard') }}">ホーム</a>
        <a href="{{ route('demo.admin.reservations.index') }}">予約一覧</a>
        <a href="{{ route('demo.admin.reservations.create') }}">手動予約</a>
        <a href="{{ route('demo.admin.services.index') }}">メニュー管理</a>
        <a href="{{ route('demo.admin.staffs.index') }}">スタッフ管理</a>
        <a href="{{ route('demo.admin.schedules.index') }}">営業時間・勤務</a>
        <a href="{{ route('demo.admin.blocks.index') }}">予約不可時間</a>
        <form method="post" action="{{ route('demo.admin.logout') }}">@csrf<button>ログアウト</button></form>
    </nav></details>
</header>
<div class="admin-layout">
    <aside>
        <a href="{{ route('demo.admin.dashboard') }}">ホーム</a>
        <a href="{{ route('demo.admin.reservations.index') }}">予約一覧</a>
        <a href="{{ route('demo.admin.reservations.create') }}">＋ 手動予約</a>
        <a href="{{ route('demo.admin.services.index') }}">メニュー管理</a>
        <a href="{{ route('demo.admin.staffs.index') }}">スタッフ管理</a>
        <a href="{{ route('demo.admin.schedules.index') }}">営業時間・勤務</a>
        <a href="{{ route('demo.admin.blocks.index') }}">予約不可時間</a>
        <form method="post" action="{{ route('demo.admin.logout') }}">@csrf<button>ログアウト</button></form>
    </aside>
    <main>
        @if(session('success'))<div class="admin-success">{{ session('success') }}</div>@endif
        @if($errors->any())<div class="booking-errors"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        @yield('content')
    </main>
</div>
</body>
</html>
