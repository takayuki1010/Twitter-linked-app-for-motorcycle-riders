<!-- ログイン、会員登録、パスリセット画面　ヘッダー、フッター画面 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('./css/sns.css')}}" rel="stylesheet">
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>バイク乗りのTwitter連携アプリ</title>
</head>
<body>
<!-- @vite('resources/js/app.js') -->
    <div class="topLayout-hed">
        <div class="title">
            <h2>バイク乗りのTwitter連携アプリ</h2>
        </div>

        <!-- indexへ遷移 -->
        <div class="topback">
            <a class="button" href="/index">トップへ戻る</a>
        </div>
    </div>

    @yield('top-layout')

    <div class="topLayout-fot">
        <div class="top-warning">
            <h3>注意事項、留意事項</h3>
            <p>※一度投稿した本文、コメントは削除できません。</p>
            <p>※誹謗中傷はやめましょう。</p>
            <p>※本サイトはバイクに乗っている方、バイクに乗る予定の方を対象にしたサイトです。</p>
            <p>バイクに乗る予定のない方、興味のない方を対象に作成しておりませんので、ご了承ください。</p>
        </div>
    </div>
</body>
</html>