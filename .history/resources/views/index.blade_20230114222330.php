<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('./css/sns.css')}}" rel="stylesheet">
    <title>バイク乗りのTwitter連携アプリ</title>
</head>
<body>
    <div class="topindexs">
        <div class="top-imgs">
            <!-- <div class="top-img"> -->
            <!-- トップ画像 -->
                <img src="{{ asset('images/20220731_115145.jpg') }}" alt="">
            <!-- </div> -->
            <div class="index-title">
                <h2>バイク乗りのTwitter連携アプリ</h2>
            </div>
        </div>

        <section>
            <div class="top-textmenu">
                <div class="top-titletext">
                        <h2>バイクに乗っている方のあいさつ投稿アプリです。</h2>
                </div>

                <div class="top-menu">
                    <div class="top-list">
                        <h3>ユーザー登録されている方：</h3>
                        <!-- ログイン画面へ -->
                        <a class="button" href="{{ route(login.index) }}">ログイン</a>
                    </div>
                    <div class="top-list">
                        <h3>新規登録の方：</h3>
                        <!-- 新規登録画面へ -->
                        <a class="button" href="">会員登録</a>
                    </div>
                </div>
            </div>
        </section>

            <div class="warning">
                <h3>注意事項、留意事項</h3>
                <p>※一度投稿した本文、コメントは削除できません。</p>
                <p>※誹謗中傷はやめましょう。</p>
                <p>※本サイトはバイクに乗っている方、バイクに乗る予定の方を対象にしたサイトです。</p>
                <p>バイクに乗る予定のない方、興味のない方を対象に作成しておりませんので、ご了承ください。</p>
            </div>
    </div>
</body>
</html>