@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>投稿詳細</h2>
    <div class="detail-button">
        <div class="detail-back">
            <button onClick="history.back();">戻る</button>
        </div>

        <div class="next-com">
            <a class="button" href="/comment">コメントを投稿</a>
        </div>
    </div>

    <div class="top-jump">
    <!-- トップへスクロール -->
        <a href="">Go To Top</a>
    </div>

    <div class="detail-main">
        <div class="detail-icon">
        <!-- ユーザーアイコン表示 -->
            <img src="{{ $userDate->img }}" alt="">
            {{ ddd($userDate->img) }}
            <h4>{{ $userDate->name }}</h4>
        </div>

        <!-- <div class="user-detail">
            <h4>登録されているユーザーネーム</h4>
        </div> -->

        <div class="detail-text">
            <p>{{ $messages->message }}</p>
        </div>

        <div class="detail-imgs">
            <div class="detail-img">
            <!-- 投稿されているimg 一つ目 -->
                <img src="{{ asset($messages->message_img1) }}" alt="">
            <!-- </div>
            <div class="detail-img"> -->
            <!-- 投稿されているimg 二つ目 -->
                <img src="{{ asset($messages->message_img2) }}" alt="">
            </div>
        </div>

        <div class="detail-createds">
            <div class="detail-created">
                <p>{{ $messages->created_at }}</p>
            </div>

            <!-- いいね表示 -->
            <div class="LikesIcon">
                <button onclick=""><i class="far fa-heart LikesIcon-fa-heart"></i></button>
            </div>
                <!-- ここにaタグ使用 -->
            </div>
        </div>
    </div>

    <!-- 繰り返し処理 -->
        <div class="detail-comment">
            <div class="user-icom">
            <!-- コメントする人のアイコン -->
                <img src="" alt="">

                <div class="comment-text">
                    <p>投稿に対してのコメント</p>
                </div>
            </div>

            <!-- <div class="comment-text">
                <p> 詳細のコメント本文</p>
            </div> -->

            <div class="comment-created">
                <p>コメント投稿び</p>
            </div>
        </div>
</section>
</div>

@endsection