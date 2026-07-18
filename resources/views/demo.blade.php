<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="自社予約システムを備えたリラクゼーションサロンのホームページデモです。">
    <meta name="theme-color" content="#f7f5ee">
    <title>nagi relaxation salon｜予約デモ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&amp;family=Shippori+Mincho:wght@500;600&amp;display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="demo-page">
    <div class="demo-bar"><p><span>DEMO</span> Relax Web 制作サンプル</p><a href="{{ route('home') }}">Relax Webへ戻る</a></div>
    <header class="demo-header">
        <a class="demo-brand" href="#demo-top"><span>nagi</span><small>relaxation salon</small></a>
        <nav aria-label="デモサイトのナビゲーション"><a href="#demo-menu">メニュー</a><a href="#demo-about">サロンについて</a><a href="#demo-access">アクセス</a></nav>
        <a class="demo-header-book" href="{{ route('demo.reservation.index') }}">予約する</a>
    </header>

    <main id="demo-top">
        <section class="demo-hero">
            <div class="demo-hero-copy reveal"><p class="demo-en">A QUIET MOMENT FOR YOU</p><h1>ほどける時間を、<br>日々のなかに。</h1><p>からだと心をゆっくり整える、<br>完全予約制のプライベートサロン。</p><a class="demo-book-button" href="{{ route('demo.reservation.index') }}"><span>空き状況を見て予約する</span><small>24時間ネット予約</small><b aria-hidden="true">→</b></a><p class="demo-book-note">メニューと日時を選んで予約できます</p></div>
            <div class="demo-hero-art reveal" role="img" aria-label="柔らかな光が差し込むリラクゼーションサロンのイメージ"><div class="demo-art-sun"></div><div class="demo-art-window"></div><div class="demo-art-bed"><span></span></div><div class="demo-art-plant"><i></i><i></i><i></i></div><p>slow down<br>and breathe.</p></div>
        </section>

        <section class="demo-promise"><div><span>01</span><strong>完全予約制</strong><small>お一人ずつ、ゆったりと</small></div><div><span>02</span><strong>女性セラピスト</strong><small>初めての方も安心</small></div><div><span>03</span><strong>駅から徒歩5分</strong><small>お仕事帰りにも</small></div></section>

        <section class="demo-section demo-menu" id="demo-menu">
            <div class="demo-heading reveal"><p>MENU</p><h2>その日のからだに、<br>ちょうどいい休息を。</h2><span>All menus</span></div>
            <div class="demo-menu-grid">
                <article class="demo-menu-card reveal"><div class="demo-menu-visual demo-menu-visual-one"><span>01</span></div><div><p>BODY CARE</p><h3>もみほぐし</h3><p>首・肩・腰など、気になる箇所を中心に全身を丁寧にほぐします。</p><dl><div><dt>60分</dt><dd>6,000円</dd></div><div><dt>90分</dt><dd>8,500円</dd></div></dl><a href="{{ route('demo.reservation.index') }}">このメニューを予約 <span>→</span></a></div></article>
                <article class="demo-menu-card reveal"><div class="demo-menu-visual demo-menu-visual-two"><span>02</span></div><div><p>OIL MASSAGE</p><h3>オイルマッサージ</h3><p>オイルを使い、全身をゆっくり流すコースです。</p><dl><div><dt>60分</dt><dd>7,500円</dd></div></dl><a href="{{ route('demo.reservation.index') }}">このメニューを予約 <span>→</span></a></div></article>
                <article class="demo-menu-card reveal"><div class="demo-menu-visual demo-menu-visual-three"><span>03</span></div><div><p>ONLINE RESERVATION</p><h3>空き状況を確認</h3><p>担当スタッフと日時を選んで、24時間いつでも予約できます。</p><dl><div><dt>予約枠</dt><dd>30分単位</dd></div></dl><a href="{{ route('demo.reservation.index') }}">空き状況を見る <span>→</span></a></div></article>
            </div>
            <p class="demo-menu-caption">※ 表示内容・料金はデモ用の架空情報です。</p>
        </section>

        <section class="demo-section demo-about" id="demo-about">
            <div class="demo-about-art reveal"><div class="demo-portrait"><span></span></div><p>therapist<br>Yui</p></div>
            <div class="demo-about-copy reveal"><p class="demo-en">ABOUT NAGI</p><h2>がんばる毎日に、<br>深呼吸できる場所を。</h2><p>nagiは、一日三組限定の小さなリラクゼーションサロンです。お一人おひとりの体調や気分に合わせて、力加減や施術内容を組み立てます。</p><p>はじめての方にも、からだのことを話すのが苦手な方にも、安心して過ごしていただける時間を大切にしています。</p><div class="demo-language"><span>ENGLISH SUPPORT</span><p>Simple English guidance is available.<br>英語でのメニュー・予約案内にも対応しています。</p></div></div>
        </section>

        <section class="demo-section demo-access" id="demo-access">
            <div class="demo-heading reveal"><p>ACCESS</p><h2>店舗情報</h2></div>
            <div class="demo-access-grid reveal"><div class="demo-map"><span>nagi</span><i>駅</i><b>徒歩5分</b></div><dl><div><dt>所在地</dt><dd>東京都〇〇区〇〇 1-2-3<br>〇〇ビル 2F</dd></div><div><dt>営業時間</dt><dd>10:00〜20:00<br>最終受付 18:30</dd></div><div><dt>定休日</dt><dd>火曜日・不定休</dd></div><div><dt>お支払い</dt><dd>現金／クレジットカード</dd></div></dl></div>
        </section>

        <section class="demo-final-cta"><div class="reveal"><p>ONLINE BOOKING</p><h2>ご予約は24時間、<br>いつでもどうぞ。</h2><span>メニューと日時を選ぶだけで、予約が完了します。</span><a class="demo-book-button demo-book-button-light" href="{{ route('demo.reservation.index') }}"><span>ネット予約へ進む</span><small>空き状況を確認</small><b aria-hidden="true">→</b></a></div></section>
    </main>

    <footer class="demo-footer"><a class="demo-brand" href="#demo-top"><span>nagi</span><small>relaxation salon</small></a><p>このページはRelax Webの架空店舗デモです。</p><a href="{{ url('/') }}">Relax Webのサービスを見る →</a></footer>
    <a class="demo-mobile-book" href="{{ route('demo.reservation.index') }}">空き状況を見て予約する <span>→</span></a>
</body>
</html>
