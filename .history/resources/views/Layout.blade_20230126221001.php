<!-- ヘッダー、フッター画面 -->
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
@vite('resources/js/app.js')
    <div class="Layout-hed">
        <a href="{{ route('list.index') }}"></a>
            <div class="title">
                <h2>バイク乗りのTwitter連携アプリ</h2>
            </div>

        <!-- ログアウト機能 -->
        <form action="{{ route('logout.index') }}">
            <div class="topback">
                <input type="button" value="ひとつ前に戻る" onClick="history.back()">
                <input type="submit" value="ログアウト">
            </div>
        </form>
    </div>

    @yield('layout')

    <div class="Layout-fot">
        <div class="top-warning">
            <h3>注意事項、留意事項</h3>
            <p>※一度投稿した本文、コメントは削除できません。</p>
            <p>※誹謗中傷はやめましょう。</p>
            <p>※本サイトはバイクに乗っている方、バイクに乗る予定の方を対象にしたサイトです。</p>
            <p>バイクに乗る予定のない方、興味のない方を対象に作成しておりませんので、ご了承ください。</p>
        </div>

        <div class="Layout-button">
            <!-- 退会画面へ -->
            <form action="{{ route('delete.index') }}">
                <button type="submit">退会</button>
            </form>
        </div>
    </div>
</body>
</html>