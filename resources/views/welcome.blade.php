<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.svg?v=2') }}" type="image/svg+xml">
    <meta name="description" content="整体・もみほぐし・個人サロンに寄り添うホームページ制作と予約導入支援。小さなお店の魅力を、伝わるかたちに整えます。">
    <meta name="theme-color" content="#f7f5ee">
    <title>Relax Web｜リラクゼーション店舗のホームページ制作</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&amp;family=Shippori+Mincho:wght@500;600&amp;display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/demo-links.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <a class="brand" href="#top" aria-label="Relax Web トップへ">
            <span class="brand-mark" aria-hidden="true">R</span>
            <span><strong>Relax Web</strong><small>salon web partner</small></span>
        </a>
        <nav class="desktop-nav" aria-label="メインナビゲーション">
            <a href="#for-you">こんなお店向け</a>
            <a href="#service">サービス</a>
            <a href="#works">制作サンプル</a>
            <a href="#price">料金</a>
            <a class="nav-cta" href="#contact">無料相談</a>
        </nav>
        <details class="mobile-menu">
            <summary aria-label="メニューを開く"><span></span><span></span></summary>
            <nav aria-label="モバイルナビゲーション">
                <a href="#for-you">こんなお店向け</a><a href="#service">サービス</a>
                <a href="#works">制作サンプル</a><a href="#price">料金</a><a href="#about">運営者情報</a>
            </nav>
        </details>
    </header>

    <main id="top">
        <section class="hero">
            <div class="hero-copy reveal">
                <p class="eyebrow">FOR SMALL RELAXATION SALONS</p>
                <h1>あなたの手のぬくもりを、<br><em>伝わるホームページ</em>に。</h1>
                <p class="hero-lead">整体・もみほぐし・個人サロンに寄り添う<br class="sp-only">ホームページ制作と予約導入支援。</p>
                <div class="hero-actions">
                    <a class="button button-primary consultation-button" href="mailto:relax.web.support@gmail.com"><span class="consultation-icon" aria-hidden="true">✉</span>メールで相談<span class="button-arrow" aria-hidden="true">→</span></a>
                    <a class="button button-instagram consultation-button" href="https://www.instagram.com/relax_web_support/" target="_blank" rel="noopener noreferrer"><span class="consultation-icon instagram-icon" aria-hidden="true">◎</span>Instagramで相談<span class="button-arrow" aria-hidden="true">→</span></a>
                </div>
                <a class="hero-work-link" href="#works">制作イメージを見る</a>
                <ul class="hero-points" aria-label="サービスの特徴">
                    <li><span>✓</span>専門知識は不要</li><li><span>✓</span>スマホ対応込み</li><li><span>✓</span>予約導入まで伴走</li>
                </ul>
            </div>
            <div class="hero-visual reveal" aria-label="リラクゼーションサロンのホームページ制作イメージ">
                <div class="sun-shape"></div><div class="leaf-shape leaf-one"></div><div class="leaf-shape leaf-two"></div>
                <div class="phone-mockup">
                    <div class="phone-top"><span></span><b>Lino body care</b><i>•••</i></div>
                    <div class="salon-photo" role="img" aria-label="やさしい光が入るサロン室内のイメージ">
                        <div class="window-light"></div><div class="bed"><span></span></div><div class="plant"><i></i><i></i><i></i></div>
                    </div>
                    <div class="phone-content"><small>からだを緩め、こころも軽く。</small><strong>ひと息つける、<br>あなただけの時間。</strong><button type="button">ご予約はこちら</button></div>
                </div>
                <div class="floating-card"><span>予約導入</span><strong>24時間受付</strong><small>機会損失を減らします</small></div>
            </div>
        </section>

        <section class="section intro" id="for-you">
            <div class="section-heading reveal"><p class="eyebrow">IS THIS YOU?</p><h2>こんなお悩み、<br class="sp-only">ありませんか？</h2><p>小さなお店だからこその悩みに、ちょうどいい方法をご提案します。</p></div>
            <div class="worry-grid">
                <article class="worry-card reveal"><span>01</span><div class="line-icon icon-phone" aria-hidden="true"></div><h3>SNSだけでは<br>信頼感が伝わりにくい</h3><p>初めての方にも安心してもらえる、お店の「顔」が欲しい。</p></article>
                <article class="worry-card reveal"><span>02</span><div class="line-icon icon-clock" aria-hidden="true"></div><h3>施術中の電話対応を<br>減らしたい</h3><p>お客様を待たせず、営業時間外でも予約を受け付けたい。</p></article>
                <article class="worry-card reveal"><span>03</span><div class="line-icon icon-laptop" aria-hidden="true"></div><h3>パソコンやWebは<br>正直よくわからない</h3><p>何を用意すればいいのか、更新できるのか不安がある。</p></article>
            </div>
            <p class="answer-message reveal"><span>Relax Webなら</span>お店の魅力整理から公開後まで、<br class="sp-only">わかりやすく伴走します。</p>
        </section>

        <section class="section services" id="service">
            <div class="section-heading light reveal"><p class="eyebrow">SERVICE</p><h2>伝える・予約される・続けられる。</h2><p>お店の状況に合わせて、必要なものを一緒に整えます。</p></div>
            <div class="service-list">
                <article class="service-item reveal"><div class="service-number">01</div><div><p class="service-label">WEBSITE</p><h3>ホームページ制作</h3><p>お店の雰囲気や強みを丁寧に伺い、日本人にも外国人のお客さまにも安心感が伝わるサイトを制作します。</p><ul><li>スマートフォン対応</li><li>英語などの多言語対応</li><li>文章づくりサポート</li></ul></div></article>
                <article class="service-item reveal"><div class="service-number">02</div><div><p class="service-label">RESERVATION</p><h3>予約システム導入支援</h3><p>営業時間外でも予約を受け付けられる仕組みを導入。お店に合ったサービス選びから設定まで支援します。</p><ul><li>予約導線の設計</li><li>初期設定サポート</li><li>使い方レクチャー</li></ul></div></article>
                <article class="service-item reveal"><div class="service-number">03</div><div><p class="service-label">AFTER SUPPORT</p><h3>公開後の運用サポート</h3><p>メニューや営業時間の変更も気軽にご相談ください。苦手な更新作業を無理なく続けられるよう支えます。</p><ul><li>軽微な文章修正</li><li>お知らせ更新</li><li>Webまわりの相談</li></ul></div></article>
            </div>
        </section>

        <section class="section existing-websites" id="existing-websites">
            <div class="section-heading reveal"><p class="eyebrow">FOR EXISTING WEBSITES</p><h2>「作ったきり」の<br class="sp-only">ホームページ、ありませんか？</h2><p>新規制作だけでなく、いまあるサイトのお悩みにも対応しています。</p></div>
            <div class="existing-check-grid">
                <div class="existing-check reveal"><span aria-hidden="true">▣</span><p>スマホで見ると崩れる・<br>文字が小さい</p></div>
                <div class="existing-check reveal"><span aria-hidden="true">↻</span><p>料金やメニューが古いまま<br>直せていない</p></div>
                <div class="existing-check reveal"><span aria-hidden="true">⌁</span><p>制作した業者と<br>連絡がとれない</p></div>
                <div class="existing-check reveal"><span aria-hidden="true">◷</span><p>更新を頼むたびに<br>費用と時間がかかる</p></div>
                <div class="existing-check reveal"><span aria-hidden="true">◇</span><p>自作したけれど、<br>デザインに自信がない</p></div>
                <div class="existing-check reveal"><span aria-hidden="true">⌕</span><p>検索しても<br>お店が出てこない</p></div>
            </div>
            <div class="existing-menu-grid">
                <article class="existing-menu-card reveal">
                    <p class="existing-menu-label">RENEWAL</p><h3>リニューアル</h3><p class="existing-menu-catch">いまのサイトを、<br>予約が入るかたちに。</p>
                    <div class="existing-menu-price"><strong>80,000</strong><span>円〜</span><small>内容により変動</small></div>
                    <h4>含まれるもの</h4><ul><li>現サイトの内容を引き継ぎつつデザイン刷新（スマートフォン対応）</li><li>予約導線の再設計（サロンボード直結 or 自社予約システム）</li><li>Googleビジネスプロフィールとの連携整備</li><li>ドメイン・サーバーの移管サポート（今の契約がわからなくてもOK）</li></ul>
                </article>
                <article class="existing-menu-card reveal">
                    <p class="existing-menu-label">UPDATE SUPPORT</p><h3>更新おまかせプラン</h3><p class="existing-menu-catch">「直しておいて」のひとことで、<br>すべて完了。</p>
                    <div class="existing-menu-price"><small>月額</small><strong>5,500</strong><span>円（税込）</span></div>
                    <h4>含まれるもの</h4><ul><li>料金・メニュー・営業時間・写真の更新（月3回まで、LINEやメールで依頼OK）</li><li>キャンペーン・お知らせの掲載</li><li>月次アクセスレポート</li><li>サーバー・ドメイン・SSLの管理代行</li></ul>
                    <p class="existing-menu-note">他社で制作されたサイト・自作サイトでも引き受けます。</p>
                </article>
            </div>
            <div class="site-diagnosis reveal"><div><span>FREE WEBSITE CHECK</span><h3>まずは、いまの状態を知ることから。</h3><p>現在のホームページのURLを送るだけ。<br>改善ポイントを3つ、無料でお伝えします。</p></div><a class="button" href="#contact">無料でサイト診断を受ける <span aria-hidden="true">→</span></a></div>
        </section>

        <section class="section works" id="works">
            <div class="section-heading reveal"><p class="eyebrow">SAMPLE WORKS</p><h2>あなたのお店らしさを、<br class="sp-only">デザインに。</h2><p>業種や雰囲気に合わせた、制作イメージの一例です。</p></div>
            <div class="works-grid">
                <article class="work-card reveal"><div class="work-browser work-green"><div class="browser-bar"><i></i><i></i><i></i></div><div class="work-hero"><small>ひだまり整体院</small><b>今日より少し、<br>軽やかな明日へ。</b><span>からだに寄り添う整体</span><button>ご予約</button><div class="work-person"></div></div></div><div class="work-meta"><p>整体院 <span>やさしい・安心感</span></p><h3>ひだまり整体院</h3></div></article>
                <article class="work-card reveal"><div class="work-browser work-beige"><div class="browser-bar"><i></i><i></i><i></i></div><div class="work-hero"><small>muku</small><b>何もしない時間も、<br>大切に。</b><span>private relaxation salon</span><button>RESERVE</button><div class="work-stones"><i></i><i></i><i></i></div></div></div><div class="work-meta"><p>個人サロン <span>上品・落ち着き</span></p><h3>private salon muku</h3></div></article>
            </div>
            <div class="demo-links">
                <a class="demo-note reveal" href="{{ route('demo') }}"><span>LIVE DEMO 01</span><p>自社ネット予約ができるサロンサイトを<br class="sp-only"><strong>/demo</strong> でお試しいただけます。 <b>→</b></p></a>
                <a class="demo-note reveal" href="{{ route('demo2') }}"><span>LIVE DEMO 02</span><p>LINE相談・手動予約を主軸にした接骨院サイトを<br class="sp-only"><strong>/demo2</strong> でお試しいただけます。 <b>→</b></p></a>
            </div>
        </section>

        <section class="section pricing" id="price">
            <div class="section-heading reveal"><p class="eyebrow">PRICE PLAN</p><h2>予約の入り口を、<br class="sp-only">ふたつ持つ。</h2><p>ホットペッパービューティーはそのままに、Googleと自社ホームページからの予約を育てます。</p></div>
            <div class="plan-grid">
                <article class="plan-card reveal">
                    <div class="plan-card-head"><p class="plan-number">PLAN 01</p><h3>スタンダード</h3><p class="plan-catch">まずは、Googleから見つかるお店に。</p></div>
                    <div class="plan-price"><p><small>制作</small><strong>50,000</strong><span>円〜</span></p><b>＋</b><p><small>月額</small><strong>3,300</strong><span>円（税込）</span></p></div>
                    <div class="plan-body"><h4>プランに含まれるもの</h4><ul><li>1ページのホームページ制作（スマートフォン対応）</li><li>Googleビジネスプロフィールの整備（写真・営業時間・予約リンク設定）</li><li>予約ボタンは今お使いのサロンボード予約ページへ直結（二重予約の心配なし・追加システム不要）</li><li>月1回の軽微修正・月次アクセスレポート</li></ul></div>
                    <p class="plan-note">予約管理は今のまま。<br>お店の作業は増えません。</p>
                    <a class="button plan-cta" href="#contact">このプランについて相談する <span aria-hidden="true">→</span></a>
                </article>
                <article class="plan-card plan-card-featured reveal">
                    <p class="plan-badge">予約手数料を減らしたいお店に</p>
                    <div class="plan-card-head"><p class="plan-number">PLAN 02</p><h3>自社予約プラン</h3><p class="plan-catch">ホームページからの予約を、自社のものに。</p></div>
                    <div class="plan-price"><p><small>制作</small><strong>80,000</strong><span>円〜</span></p><b>＋</b><p><small>月額</small><strong>8,800</strong><span>円（税込）</span></p><em>予約システム利用料込み</em></div>
                    <div class="plan-body"><h4>プランに含まれるもの</h4><ul><li>スタンダードの全内容</li><li>自社予約システムの導入（ホームページに24時間ネット予約を設置）</li><li>サロンボードと自動連携し空き枠を同期（二重予約を防止）</li><li>自社予約分はホットペッパーの予約手数料がかからず、顧客情報もお店の資産に</li></ul></div>
                    <p class="plan-note">ホームページ経由の予約が月30件を超えるお店は、手数料の節約だけで月額の元が取れます。</p>
                    <a class="button plan-cta" href="#contact">このプランについて相談する <span aria-hidden="true">→</span></a>
                </article>
            </div>
            <div class="plan-footnotes reveal"><p>※ホットペッパービューティーの掲載料・手数料は含まれません。</p><p>※どちらのプランも契約期間の縛りはありません。</p></div>
            <div class="monitor-link-banner reveal"><div><span>先着3店舗限定</span><h3>モニター価格 10,000円でも承ります</h3><p>制作実績として掲載可能な店舗様限定。1ページ制作・スマートフォン・多言語対応を含みます。</p></div><a class="button" href="#contact">モニターについて相談する <span aria-hidden="true">→</span></a></div>
        </section>

        <section class="section about" id="about">
            <div class="about-inner reveal">
                <div class="about-copy"><p class="eyebrow">ABOUT US</p><h2>お店の想いを、<br>お客様へつなぐ。</h2><p>Relax Webは、整体・もみほぐし・個人サロンなど、小さなリラクゼーション店舗に特化したWeb制作サービスです。</p><p>専門用語をなるべく使わず、わかりやすい説明と丁寧なヒアリングを大切にしています。</p><blockquote>Webが苦手な方にも、<br>安心して相談できるパートナーでありたい。</blockquote></div>
                <dl class="operator-info"><div><dt>屋号</dt><dd>Relax Web</dd></div><div><dt>事業内容</dt><dd>ホームページ制作<br>予約システム導入支援<br>Web運用サポート</dd></div><div><dt>対応エリア</dt><dd>全国（オンライン対応）</dd></div><div><dt>営業時間</dt><dd>平日 10:00〜18:00</dd></div></dl>
            </div>
        </section>

        <section class="contact" id="contact">
            <div class="contact-inner reveal">
                <p class="eyebrow">CONTACT</p><h2>まだ何も決まっていなくても、<br>大丈夫です。</h2><p>「ホームページって何から始めるの？」という段階から、お気軽にご相談ください。<br>ご相談・お見積もりは無料です。</p>
                <div class="contact-actions">
                    <a class="button button-white consultation-button" href="mailto:relax.web.support@gmail.com"><span class="consultation-icon" aria-hidden="true">✉</span>メールで相談する<span class="button-arrow" aria-hidden="true">→</span></a>
                    <a class="button button-contact-instagram consultation-button" href="https://www.instagram.com/relax_web_support/" target="_blank" rel="noopener noreferrer"><span class="consultation-icon instagram-icon" aria-hidden="true">◎</span>Instagramで相談する<span class="button-arrow" aria-hidden="true">→</span></a>
                </div>
                <div class="contact-profile">
                    <div class="contact-profile-heading"><span class="instagram-avatar" aria-hidden="true">R</span><p><strong>Relax Web｜サロン向けWeb制作</strong><a href="https://www.instagram.com/relax_web_support/" target="_blank" rel="noopener noreferrer">@relax_web_support</a></p></div>
                    <p>整体・もみほぐし・個人サロン向け<br>ホームページ制作・予約導入をサポートします<br>スマホ対応／Instagram・Googleマップ導線<br>ご相談はDMまたはメールへ<br>運営：杉野</p>
                    <a class="contact-email" href="mailto:relax.web.support@gmail.com">relax.web.support@gmail.com</a>
                </div>
                <small class="reply-note">通常2営業日以内に返信いたします</small>
            </div>
        </section>
    </main>

    <footer><a class="brand footer-brand" href="#top"><span class="brand-mark">R</span><span><strong>Relax Web</strong><small>salon web partner</small></span></a><p>小さなサロンの、頼れるWebパートナー。</p><div class="footer-contacts"><a href="mailto:relax.web.support@gmail.com"><span aria-hidden="true">✉</span> relax.web.support@gmail.com</a><a href="https://www.instagram.com/relax_web_support/" target="_blank" rel="noopener noreferrer"><span aria-hidden="true">◎</span> @relax_web_support</a></div><nav><a href="#service">サービス</a><a href="#works">制作サンプル</a><a href="#price">料金</a><a href="#about">運営者情報</a></nav><small>© {{ date('Y') }} Relax Web</small></footer>
    <a class="mobile-fixed-cta" href="#contact">無料で相談する <span>→</span></a>
</body>
</html>
