<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.svg?v=2') }}" type="image/svg+xml">
    <meta name="description" content="LINEから相談・予約できるマッサージ・ボディケアサロンのホームページデモです。">
    <meta name="theme-color" content="#f5f1e8">
    <title>suu massage &amp; body care｜LINE受付デモ</title>
    @vite(['resources/css/demo2.css', 'resources/js/app.js'])
</head>
<body>
    @php($lineUrl = config('relax_web.line_url'))
    <div class="clinic-demo-bar"><p><span>DEMO 02</span> Relax Web 制作サンプル</p><a href="{{ route('home') }}">Relax Webへ戻る</a></div>

    <header class="clinic-header">
        <a class="clinic-brand" href="#top"><span>suu</span><small>massage &amp; body care</small></a>
        <nav aria-label="ページ内ナビゲーション"><a href="#first">初めての方</a><a href="#flow">予約方法</a><a href="#information">院情報</a></nav>
        <a class="clinic-header-line" href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer">LINEで予約</a>
    </header>

    <main id="top">
        <section class="clinic-hero">
            <div class="clinic-hero-copy">
                <p class="clinic-eyebrow">SUU MASSAGE &amp; BODY CARE</p>
                <h1>疲れた日に、<br>思い出してもらえる<br><em>小さなサロン。</em></h1>
                <p class="clinic-lead">コースの相談も、ご希望日時の確認もLINEから。決まった時間枠に迷わず、今の身体に合うメニューをご案内します。</p>
                <div class="clinic-hero-actions">
                    <a class="clinic-line-button" href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer"><span>LINEで相談・予約する</span><small>24時間受付／返信は営業時間内</small><b>→</b></a>
                    <a class="clinic-phone-link" href="#menu">メニューを見る</a>
                </div>
            </div>
            <div class="clinic-hero-visual" aria-label="LINEで希望日時を相談する画面のイメージ">
                <div class="clinic-sun"></div>
                <div class="clinic-phone">
                    <div class="clinic-phone-head"><span>suu massage</span><small>LINE</small></div>
                    <div class="clinic-chat">
                        <p>肩まわりが疲れています。どのコースがよいですか？</p>
                        <p>ボディケア60分がおすすめです。ご希望日時はありますか？</p>
                        <p>土曜日の午前を希望します。</p>
                        <div><strong>土曜日 10:30</strong><span>ご予約を承りました</span></div>
                    </div>
                </div>
                <p class="clinic-visual-note">コースと希望日時を<br>気軽に相談できます。</p>
            </div>
        </section>

        <section class="clinic-quick">
            <div><span>01</span><strong>初めての方</strong><small>LINEでコースと希望日時を相談</small></div>
            <div><span>02</span><strong>リピーターの方</strong><small>お帰りの際またはLINEで次回予約</small></div>
            <div><span>03</span><strong>急なご相談</strong><small>空き状況を確認してご案内</small></div>
        </section>

        <section class="clinic-section clinic-first" id="first">
            <div class="clinic-section-heading"><p>FOR YOUR FIRST VISIT</p><h2>初めての方は、<br>この3つを送るだけ。</h2><span>長い予約フォームへの入力は必要ありません。</span></div>
            <div class="clinic-message-grid">
                <article><i>1</i><h3>お名前</h3><p>フルネームをお送りください。</p></article>
                <article><i>2</i><h3>気になるところ</h3><p>肩・腰・脚など、疲れを感じるところを分かる範囲でお送りください。</p></article>
                <article><i>3</i><h3>希望日時</h3><p>第2希望までいただけると、スムーズにご案内できます。</p></article>
            </div>
            <div class="clinic-template"><span>送信例</span><p>杉野です。肩と首が疲れているので、ボディケアを希望します。<br>第1希望：土曜午前／第2希望：月曜18時以降</p></div>
        </section>

        <section class="clinic-section clinic-flow" id="flow">
            <div class="clinic-section-heading"><p>RESERVATION FLOW</p><h2>お一人ずつに合わせた、<br>シンプルな予約方法。</h2></div>
            <div class="clinic-flow-layout">
                <article class="clinic-flow-card clinic-flow-new"><p>初めての方</p><h3>LINEから相談・予約</h3><ol><li><span>01</span>友だち追加</li><li><span>02</span>希望メニューと日時を送信</li><li><span>03</span>サロンから予約時間をご案内</li></ol><a href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer">LINEを開く <b>→</b></a></article>
                <article class="clinic-flow-card"><p>リピーターの方</p><h3>帰り際＋LINEで次回予約</h3><ol><li><span>01</span>施術後に次回の目安を相談</li><li><span>02</span>その場で予約、または後からLINE</li><li><span>03</span>日時変更のご連絡もLINEで完了</li></ol><small>ご予定が分からない場合は、後日のご連絡で大丈夫です。</small></article>
            </div>
        </section>

        <section class="clinic-section clinic-care" id="menu">
            <div class="clinic-section-heading"><p>CARE MENU</p><h2>その日の疲れに合わせて、<br>ちょうどよい休息を。</h2><span>メニューに迷ったときは、LINEからお気軽にご相談ください。</span></div>
            <div class="clinic-care-grid">
                <article><span>01</span><h3>ボディケア 60分</h3><p>肩・腰・脚など、気になるところを中心に全身をゆっくりほぐします。</p><b>6,000円</b></article>
                <article><span>02</span><h3>オイルトリートメント 60分</h3><p>オイルを使い、心地よい圧で全身を流すリラックスコースです。</p><b>7,500円</b></article>
                <article><span>03</span><h3>ヘッド＆ネック 40分</h3><p>首・肩・頭まわりを中心に、短い時間でリフレッシュします。</p><b>4,500円</b></article>
            </div>
            <p class="clinic-care-note">※ 表示内容・料金はRelax Webのデモ用の架空情報です。</p>
        </section>

        <section class="clinic-section clinic-info" id="information">
            <div class="clinic-map" aria-label="suu massage and body care周辺の地図イメージ"><span>suu<br>massage</span><i>駅</i><b>徒歩4分</b></div>
            <div class="clinic-info-copy"><p class="clinic-eyebrow">INFORMATION</p><h2>suu massage &amp; body care</h2><dl><div><dt>住所</dt><dd>〇〇県〇〇市〇〇町1-2-3</dd></div><div><dt>営業時間</dt><dd>10:00〜20:00</dd></div><div><dt>定休日</dt><dd>火曜日</dd></div><div><dt>予約</dt><dd>LINEまたはお電話</dd></div></dl><p>※ 掲載内容はRelax Webのデモ用の架空情報です。</p></div>
        </section>

        <section class="clinic-line-cta">
            <div><p>LINE RESERVATION</p><h2>空き状況も、メニューの相談も。<br>LINEからどうぞ。</h2><span>友だち追加後、お名前・希望メニュー・希望日時をお送りください。</span>
                <a class="clinic-line-official" href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="LINEで友だち追加" width="116" height="36"><b>LINEを開く →</b></a>
            </div>
        </section>
    </main>

    <footer class="clinic-footer"><a class="clinic-brand" href="#top"><span>suu</span><small>massage &amp; body care</small></a><p>LINEで相談できる、小さなボディケアサロン。</p><a href="{{ route('home') }}">Relax Web 制作サンプル</a></footer>
    <a class="clinic-mobile-line" href="{{ $lineUrl }}" target="_blank" rel="noopener noreferrer"><span>LINEで相談・予約</span><b>→</b></a>
</body>
</html>
