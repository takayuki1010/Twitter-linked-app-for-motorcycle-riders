@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>投稿詳細</h2>
    <div class="detail-button">
        <div class="detail-back">
            <a class="button" href="{{ route('list') }}">戻る</a>
        </div>

        <div class="next-com">
            <a class="button" href="{{ route('comment') }}">コメントを投稿</a>
        </div>
    </div>

    <div class="top-jump">
    <!-- トップへスクロール -->
        <a href="">Go To Top</a>
    </div>

    <div class="detail-main">
        <div class="detail-icon">
        <!-- ユーザーアイコン表示 -->
            <img src="{{ asset('images/S__67870726.jpg') }}" alt="">
            <h4>{{ $user->name->user_id }}</h4>
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
                <img src="{{ $messages->message_img1 }}" alt="">
            <!-- </div>
            <div class="detail-img"> -->
            <!-- 投稿されているimg 二つ目 -->
                <img src="{{ $messages->message_img2 }}" alt="">
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
            <img src="{{ asset('images/S__67870726.jpg') }}" alt="">
            <div class="comment-text">
                <p> 詳細のコメント本文</p>
            </div>
        </div>

        <!-- <div class="comment-text">
            <p> 詳細のコメント本文</p>
        </div> -->

        <div class="comment-created">
            <p>＜投稿日( データベースの日にち記載 )＞</p>
        </div>
    </div>
</section>
</div>

@endsection