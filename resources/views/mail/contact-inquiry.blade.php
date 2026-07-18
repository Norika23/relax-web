<h1>ホームページから相談が届きました</h1>

<dl>
    <dt>お名前</dt>
    <dd>{{ $inquiry['name'] }}</dd>

    <dt>メールアドレス</dt>
    <dd>{{ $inquiry['email'] }}</dd>

    <dt>お店の業種</dt>
    <dd>{{ $inquiry['business_type'] ?: '未入力' }}</dd>

    <dt>相談したいこと</dt>
    <dd>{!! nl2br(e($inquiry['message'] ?: '未入力')) !!}</dd>
</dl>

<p>このメールに返信すると、相談者のメールアドレスへ返信できます。</p>
