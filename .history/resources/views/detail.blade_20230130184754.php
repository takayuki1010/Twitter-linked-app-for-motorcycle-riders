@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>投稿詳細</h2>
    <div class="detail-button">
        <!-- <div class="detail-back">
            <button onClick="history.back();">戻る</button>
        </div> -->

        <!-- コメント投稿画面へ -->
        @if(Auth::user()->role == 11 && Auth::user()->id !== $users->id)
        <div class="next-com">
            <!-- どのメッセージにコメントするか -->
            <a class="button" href="/commentindex/{{ $messages->id }}">コメントを投稿</a>
        </div>
        @endif
    </div>

    <div class="top-jump">
    <!-- トップへスクロール -->
        <a href="">Go To Top</a>
    </div>

    <div class="detail-main">
        <div class="detail-icon">
        <!-- ユーザーアイコン表示 -->
            <img src="{{ asset($users->img) }}" alt="">
            <h4>{{ $users->name }}</h4>
        </div>

        <div class="detail-text">
            <p>{{ $messages->message }}</p>
        </div>

        <div class="detail-imgs">
            <div class="detail-img">
            <!-- メッセージに投稿されているimg 一つ目 -->
                <img src="{{ asset($messages->message_img1) }}" alt="">

            <!-- メッセージに投稿されているimg 二つ目 -->
                <img src="{{ asset($messages->message_img2) }}" alt="">
            </div>
        </div>

        <div class="detail-createds">
            <div class="detail-created">
                <!-- 投稿日 -->
                <p>{{ $messages->created_at }}</p>
            </div>
            {{dd($messages->user_id,Auth::id())}}

            <!-- いいね表示 -->
            @if(Auth::user()->role !== 5 || Auth::id() !== $messages->user_id)
                <span>
                <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                @if($like)
                <!-- 「いいね」取消用ボタンを表示 -->
                    <a style="text-decoration:none;  color: red;" href="/reply/unlike/{{ $messages->id }}" class="btn btn-success btn-sm">
                    <img src="{{asset('images/ハートのマーク.png')}}" width="30px">
                        いいね
                        <!-- 「いいね」の数を表示 -->
                        <span class="badge">
                            {{ $post->likes->count() }}
                        </span>
                    </a>
                @else
                <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                    <a style="text-decoration:none; color: black;" href="/reply/like/{{ $messages->id }}" class="btn btn-secondary btn-sm">
                    <img src="{{asset('images/ハートのマーク (1).png')}}" width="30px">
                        いいね
                        <!-- 「いいね」の数を表示 -->
                        <span class="badge">
                            {{ $post->likes->count() }}
                        </span>
                    </a>
                @endif
                </span>
                
            @else
            <span>
                <img src="{{asset('images/ハートのマーク.png')}}" width="30px" height="30px">
                いいね   
                <!-- 「いいね」の数を表示 -->
                <span class="badge">
                    {{ $post->likes->count() }}
                </span>
            </span>
            @endif
            <!-- いいね機能終わり -->
        </div>
    </div>

    <!-- メッセージに対してのコメント表示　繰り返し処理 -->
    @foreach($comment_message as $comments)
        <div class="detail-comment">
            <div class="user-icom">

            <!-- コメントしている人のアイコン -->
                <img src="{{ asset($comments->comment_users->img) }}" alt="">

                <!-- 投稿へのコメント表示 -->
                <div class="comment-text">
                    <p>ユーザー名  {{ $comments->comment_users->name }}:</p>
                    <p>{{ $comments->comment}}</p>
                </div>
            </div>

            <!-- <div class="comment-text">
                <p> 詳細のコメント本文</p>
            </div> -->
            <!-- コメントが投稿された日 -->
            <div class="comment-created">
                <p>{{ $comments->created_at }}</p>
            </div>
        </div>
        @endforeach
        <!-- 繰り返し終わり -->
</section>
</div>

@endsection