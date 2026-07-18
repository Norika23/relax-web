<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.svg?v=2') }}" type="image/svg+xml">
    <meta name="description" content="整体・リラクゼーションサロン・教室など、小さなお店の情報と問い合わせ導線を分かりやすく整えるホームページ制作サービスです。">
    <meta name="theme-color" content="#f1fbff">
    <title>Relax Web｜小さなお店のネット周りをやさしく整えます</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    @vite(['resources/css/home.css', 'resources/js/app.js'])
</head>
<body>
@php
    $lineUrl = config('relax_web.line_url');
    $instagramUrl = config('relax_web.instagram_url');
    $email = config('relax_web.email');
@endphp
<header class="rw-header">
    <a class="rw-logo" href="#top" aria-label="Relax Web トップへ"><span>R</span><strong>Relax Web<small>小さなお店のWebサポート</small></strong></a>
    <nav class="rw-desktop-nav" aria-label="メインナビゲーション"><a href="#services">サービス内容</a><a href="#pricing">料金</a><a href="#flow">制作の流れ</a><a href="#faq">よくある質問</a><a href="#contact">お問い合わせ</a></nav>
    <a class="rw-header-line" href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer">LINEで相談</a>
    <details class="rw-mobile-menu"><summary aria-label="メニューを開く"><span></span><span></span><span></span></summary><nav><a href="#services">サービス内容</a><a href="#pricing">料金</a><a href="#flow">制作の流れ</a><a href="#faq">よくある質問</a><a href="#contact">お問い合わせ</a><a href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer">LINEで相談する</a></nav></details>
</header>

<main id="top">
    <section class="rw-hero">
        <div class="rw-hero-copy">
            <p class="rw-kicker">整体・リラクゼーションサロン・教室など、小さなお店向け</p>
            <h1>ホームページのこと、<br><em>難しく考えなくて大丈夫です。</em></h1>
            <p class="rw-hero-lead">整体・リラクゼーションサロン・教室など、小さなお店向けのホームページ制作サービスです。専門用語をなるべく使わず、相談しながら一緒に作ります。</p>
            <p class="rw-hero-message">ホームページを作るだけではなく、お客様が情報を見て、安心して問い合わせできるところまで整えます。</p>
            <div class="rw-hero-actions"><a class="rw-button rw-button-line" href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer">LINEで無料相談する <span>→</span></a><a class="rw-button rw-button-outline" href="#services">サービス内容を見る</a></div>
            <ul class="rw-assurance"><li>相談無料</li><li>無理な営業なし</li><li>必要なものだけ提案</li><li>ITが苦手でも大丈夫</li></ul>
        </div>
        <div class="rw-hero-visual" aria-label="小さなお店のホームページがパソコンとスマートフォンに表示されているイメージ">
            <div class="rw-browser"><div class="rw-browser-bar"><i></i><i></i><i></i><span>ひだまり整体院</span></div><div class="rw-browser-page"><small>からだに寄り添う整体</small><strong>今日より少し、<br>軽やかな明日へ。</strong><p>メニュー　料金　アクセス</p><b>LINEで相談</b></div></div>
            <div class="rw-phone"><div><small>ひだまり整体院</small><strong>肩や腰のお悩みを<br>気軽にご相談ください</strong><b>LINEで予約</b></div></div>
            <div class="rw-visual-note"><span>✓</span><p>スマホ対応<br><small>読みやすく、押しやすく</small></p></div>
        </div>
    </section>

    <section class="rw-problems rw-section" id="problems">
        <x-section-heading label="よくあるお悩み" title="こんなお悩み、ありませんか？" description="必要なのは、大がかりなシステムではなく、まず情報を分かりやすく整えることかもしれません。" />
        <div class="rw-problem-grid">
            <article><div class="rw-problem-meta"><span>01</span><small>INFORMATION</small></div><h3>Instagramだけでは、<br>料金やサービスが伝わりにくい</h3><p>大切な情報が投稿に埋もれず、初めての方にも迷わず見つけてもらえる状態に。</p></article>
            <article><div class="rw-problem-meta"><span>02</span><small>COST &amp; PROCESS</small></div><h3>費用や進め方が分からず、<br>依頼するのが不安</h3><p>何が必要で、どのように進むのか。専門用語を使わず、最初に分かりやすくご案内します。</p></article>
            <article><div class="rw-problem-meta"><span>03</span><small>CONTACT FLOW</small></div><h3>LINEや問い合わせへの流れを、<br>もっと分かりやすくしたい</h3><p>お客様が次に何をすればよいか迷わない、自然で押しやすい相談導線を整えます。</p></article>
        </div>
    </section>

    <section class="rw-services rw-section" id="services">
        <x-section-heading label="サービス内容" title="作るものではなく、<br>お店にとって良くなることから考えます。" description="お客様が知りたい情報を見つけ、迷わず相談できる状態を整えます。" />
        <div class="rw-service-grid">
            <article><span>01</span><h3>ホームページの情報を分かりやすく整える</h3><p>料金、メニュー、店舗情報、よくある質問を整理し、初めて見る方にもお店のことが伝わるページにします。</p><ul><li>メニュー・料金の整理</li><li>店舗情報・営業時間の掲載</li><li>アクセス案内の中でGoogleマップを活用</li><li>Instagramとホームページを連携</li></ul></article>
            <article><span>02</span><h3>問い合わせまでの流れを整える</h3><p>ホームページを見たあと、どこから相談すればよいか迷わない導線を作り、電話対応の負担も減らします。</p><ul><li>LINE公式アカウントへの導線</li><li>問い合わせフォームの設置</li><li>電話や既存予約サービスへのリンク</li><li>スマートフォンで押しやすいボタン</li></ul></article>
            <article><span>03</span><h3>公開後も困らないようにサポートする</h3><p>公開して終わりではなく、料金や営業時間が変わったときも、同じ担当者へ相談できます。</p><ul><li>軽微な文章・画像の変更</li><li>営業時間など店舗情報の更新</li><li>LINEやInstagram導線の見直し</li><li>ネット周りで困ったときの相談</li></ul></article>
        </div>
    </section>

    <section class="rw-features rw-section" id="features">
        <div class="rw-feature-intro"><p>Relax Webのサポート方針</p><h2>作って終わりではなく、<br>分からないところを一緒に整えます。</h2><span>予約も、独自システムを無理に勧めません。LINEでの手動受付、電話、今お使いの予約サービスなど、お店に合う方法をご案内します。</span></div>
        <div class="rw-feature-list"><article><b>1</b><div><h3>難しい専門用語をなるべく使いません</h3><p>分からない言葉をそのままにせず、できるだけ普段の言葉で説明します。</p></div></article><article><b>2</b><div><h3>必要のない機能は無理に勧めません</h3><p>まずは必要な情報と問い合わせ導線を整え、費用をかけすぎない方法を考えます。</p></div></article><article><b>3</b><div><h3>完成後も相談できます</h3><p>営業時間や写真の変更など、公開後の小さな困りごともご相談ください。</p></div></article></div>
    </section>

    <section class="rw-pricing rw-section" id="pricing">
        <x-section-heading label="料金" title="初期制作費なし。<br>月額5,500円の1プランです。" description="最初に大きな費用をかけず、ホームページ制作と公開後のサポートをまとめてご利用いただけます。" />
        <article class="rw-monthly-plan">
            <div class="rw-monthly-plan-head"><span>WEB SUPPORT PLAN</span><h3>ホームページ制作・更新サポート</h3><p><small>初期制作費</small><strong>0</strong><b>円</b></p><div class="rw-monthly-price"><small>月額</small><strong>{{ number_format(config('relax_web.prices.monthly')) }}</strong><span>円</span></div></div>
            <div class="rw-monthly-plan-body"><h4>月額5,500円に含まれるもの</h4><ul><li>1ページのホームページ制作</li><li>スマートフォン対応</li><li>メニュー・料金・店舗情報の整理と掲載</li><li>アクセス情報の掲載（必要に応じてGoogleマップを利用）</li><li>LINE・Instagram・問い合わせへの導線</li><li>よくある質問の掲載</li><li>公開後の軽微な文章・画像・営業時間変更</li><li>困ったときの相談サポート</li></ul><div class="rw-plan-pending"><strong>現在確認中の項目</strong><p>契約期間、解約条件、ドメインなどの実費、修正対応の範囲・回数は現在整理中です。確定後、契約前に分かりやすくご案内します。</p><!-- TODO: 契約条件・実費・修正対応範囲が確定したら正式な内容へ差し替える。 --></div><a href="#contact">このプランについて相談する <span>→</span></a></div>
        </article>
        <p class="rw-price-note">追加ページや大幅な機能追加が必要な場合は、作業前に内容をご相談します。</p>
    </section>

    <section class="rw-flow rw-section" id="flow">
        <x-section-heading label="制作の流れ" title="一つずつ確認しながら進めます" description="最初から内容が決まっていなくても大丈夫です。" />
        <ol class="rw-flow-list"><li><b>1</b><div><h3>LINEまたはフォームから相談</h3><p>「まだ何も決まっていない」というご相談でも大丈夫です。</p></div></li><li><b>2</b><div><h3>お店の悩みや必要な内容を確認</h3><p>今困っていること、載せたい情報をお聞きします。</p></div></li><li><b>3</b><div><h3>内容と料金を提案</h3><p>作るページと費用を、分かりやすく事前にお伝えします。</p></div></li><li><b>4</b><div><h3>制作・確認</h3><p>画面を見ていただき、文章や色などを一緒に確認します。</p></div></li><li><b>5</b><div><h3>公開・サポート開始</h3><p>公開後の変更や分からないこともご相談いただけます。</p></div></li></ol>
    </section>

    <section class="rw-faq rw-section" id="faq">
        <x-section-heading label="よくある質問" title="ご相談前の気になること" />
        <div class="rw-faq-list">
            <details><summary>パソコンが苦手でも大丈夫ですか？</summary><p>はい。専門用語をなるべく使わず、一つずつ確認しながら進めます。LINEやメールでのやり取りも可能です。</p></details>
            <details><summary>写真や文章が用意できません</summary><p>載せる内容の整理から一緒に考えます。写真についても、必要な種類や撮り方をご案内します。</p></details>
            <details><summary>予約機能も作れますか？</summary><p>お店の運用に合わせ、LINEでの受付や既存予約サービスへの連携をご案内します。独自の予約システムが必要な場合は、内容を確認したうえで相談対応します。</p></details>
            <details><summary>LINEで予約を受けられますか？</summary><p>はい。LINE公式アカウントへの分かりやすい導線を設置できます。必要に応じて初期設定もサポートします。</p></details>
            <details><summary>ホームページ完成後の更新はどうなりますか？</summary><p>更新サポートをご利用いただけます。料金や営業時間、写真などの軽微な変更をご相談ください。</p></details>
            <details><summary>月額料金は必ず必要ですか？</summary><p>現在ご案内しているサービスは月額5,500円のプランです。契約期間や解約条件、別途必要になる実費については現在整理中のため、確定後に契約前のご案内へ明記します。</p></details>
            <details><summary>遠方のお店でも依頼できますか？</summary><p>はい。LINE、メール、オンライン通話などを使って全国からご相談いただけます。</p></details>
        </div>
    </section>

    <section class="rw-profile rw-section" id="profile">
        <div class="rw-profile-mark"><span>R</span><small>Relax Web</small></div><div><p>運営者・サポート方針</p><h2>相談から公開後まで、同じ担当者が対応します。</h2><p>担当者が途中で変わらないため、お店のことを理解したうえで継続して対応します。分からないことを分からないまま進めず、一つずつ確認しながら作ります。</p><dl><div><dt>運営</dt><dd>杉野</dd></div><div><dt>対応</dt><dd>ホームページ制作・問い合わせ導線の整理・公開後サポート</dd></div></dl></div>
    </section>

    <section class="rw-contact rw-section" id="contact">
        <div class="rw-contact-intro"><p>お問い合わせ</p><h2>まだ何も決まっていなくても大丈夫です。</h2><span>ホームページが必要かどうか分からない段階でも、気軽にご相談ください。</span><div class="rw-line-recommended">おすすめの相談方法</div><a class="rw-button rw-button-line" href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer">LINEで無料相談する <b>→</b></a><small class="rw-line-note">短いメッセージだけでも大丈夫です。無理な営業はしません。</small><div class="rw-contact-links"><a href="mailto:{{ $email }}">{{ $email }}</a><a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer">{{ config('relax_web.instagram_name') }}</a></div></div>
        <div class="rw-form-wrap"><h3>フォームから相談する</h3><p>お名前とメールアドレスだけでも送信できます。</p>
            @if (session('contact_success'))
                <div class="rw-form-alert rw-form-alert-success" role="status">{{ session('contact_success') }}</div>
            @endif
            @if (session('contact_error'))
                <div class="rw-form-alert rw-form-alert-error" role="alert">{{ session('contact_error') }}</div>
            @endif
            @if ($errors->any())
                <div class="rw-form-alert rw-form-alert-error" role="alert">入力内容をご確認ください。</div>
            @endif
            <form class="rw-contact-form" method="post" action="{{ route('contact.store') }}">
                @csrf
                <div class="rw-honeypot" aria-hidden="true"><label>ウェブサイト<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
                <label>お名前<span>必須</span><input type="text" name="name" value="{{ old('name') }}" autocomplete="name" required aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}">@error('name')<small class="rw-field-error">{{ $message }}</small>@enderror</label><label>メールアドレス<span>必須</span><input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}">@error('email')<small class="rw-field-error">{{ $message }}</small>@enderror</label><label>お店の業種<small>任意</small><input type="text" name="business_type" value="{{ old('business_type') }}" placeholder="例：整体、リラクゼーションサロン、教室" aria-invalid="{{ $errors->has('business_type') ? 'true' : 'false' }}">@error('business_type')<small class="rw-field-error">{{ $message }}</small>@enderror</label><label>相談したいこと<small>任意・短い文章で大丈夫です</small><textarea name="message" rows="4" placeholder="例：Instagramだけなので、ホームページが必要か相談したい" aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}">{{ old('message') }}</textarea>@error('message')<small class="rw-field-error">{{ $message }}</small>@enderror</label><button type="submit">相談内容を送信する</button><small>送信後、ご入力いただいたメールアドレスへご連絡します。</small>
            </form>
        </div>
    </section>
</main>

<footer class="rw-footer"><a class="rw-logo" href="#top"><span>R</span><strong>Relax Web<small>小さなお店のWebサポート</small></strong></a><p>ITが苦手な小さなお店の、ネット周りを分かりやすく。</p><nav><a href="#services">サービス内容</a><a href="#pricing">料金</a><a href="#flow">制作の流れ</a><a href="#faq">よくある質問</a><a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer">Instagram</a></nav><small>© {{ date('Y') }} Relax Web</small></footer>
</body>
</html>
