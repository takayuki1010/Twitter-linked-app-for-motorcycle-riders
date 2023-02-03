@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>投稿一覧</h2>
    <div class="list">
        <div class="list-button">
            <div class="list-post">
                <!-- 投稿画面へ -->
                <a class="button" href="">投稿</a>
            </div>
            <div class="user-post">
                <!-- ユーザー情報変更画面へ -->
                <a class="button" href="">ユーザー情報変更</a>
            </div>
        </div>

        <div class="top-jump">
            <p class="jumpbutton"><a href="#">Go To Top</a></p>
        </div>

        <!-- メッセージを表示　１０個づつ 繰り返し処理 -->
        <div class="top-content">
            <!-- idをdetail.phpへ渡す -->
            <!-- メッセージのidを取得し詳細画面へ -->
            <a href="">

                <!-- ユーザーのアイコン -->
                <div class="top-img">
                    <!-- 投稿した画像の１番目のみ表示 -->
                    <img src="" alt="投稿した画像の１番目">
                    <!-- リレーションしたnameを表示　投稿主の名前 -->
                    <p></p>
                </div>

                <!-- メッセージ表示 -->
                <div class="top-text">
                    <!-- 投稿したメッセージを表示 -->
                    <p></p>
                </div>

                <!-- いつ投稿したのか表示 -->
                <div class="top-created">
                    <p></p>
                </div>
            </a>
        <!-- 繰り返し終わり -->
        <!-- ページネーション　１０投稿づつ表示 -->
            <div class="paging">
                <!-- $messages->links('pagination::semantic-ui') -->
            </div>

        </div>
    </div>
</section>
</div>

@endsection