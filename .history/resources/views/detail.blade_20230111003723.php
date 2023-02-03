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
            <a class="button" href="/comment/{{$messages->id}}">コメントを投稿</a>
        </div>
    </div>

    <div class="top-jump">
    <!-- トップへスクロール -->
        <a href="">Go To Top</a>
    </div>

    <div class="detail-main">
        <div class="detail-icon">
        <!-- ユーザーアイコン表示 -->
            <img src="{{ asset($userDate->img) }}" alt="">
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
                <div class="col-md-3">
                    <form action="{{ route('unfavorites', $post) }}" method="POST">
                        @csrf
                        <input type="submit" value="&#xf004;いいね取り消す" class="fas btn btn-danger">
                    </form>
                </div>
                <div class="LikesIcon">
                    <form action="{{ route('favorites', $post) }}" method="POST">
                    @csrf
                        <input type="submit" value="&#xf004;いいね" class="fas btn btn-success">
                    </form>
                </div>
            <!-- いいね機能終わり -->
        </div>
    </div>

    <!-- 繰り返し処理 -->
    @foreach($comments as $comment)
        <div class="detail-comment">
            <div class="user-icom">
            <!-- コメントする人のアイコン -->
                <img src="{{ asset($imgs->img) }}" alt="">

                <div class="comment-text">
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>

            <!-- <div class="comment-text">
                <p> 詳細のコメント本文</p>
            </div> -->

            <div class="comment-created">
                <p>{{ $comment->created_at }}</p>
            </div>
        </div>
        @endforeach
</section>
</div>

@endsection