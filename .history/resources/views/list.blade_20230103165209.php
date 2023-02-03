@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>投稿一覧</h2>
    <div class="list">
        <div class="list-button">
            <div class="list-post">
                <a class="button" href="{{ route('post') }}">投稿</a>
            </div>
            <div class="user-post">
                <a class="button" href="{{ route('change') }}">ユーザー情報変更</a>
            </div>
        </div>

        <div class="top-jump">
            <p class="jumpbutton"><a href="#">Go To Top</a></p>
        </div>

        <!-- 繰り返し処理 -->
        @foreach($messages as $message)
        @foreach($items as $item)
        <div class="top-content">
            <a href="{{ route('detail') }}">

                <!-- ユーザーのアイコン -->
                <div class="top-img">
                    <!-- 投稿した画像の１番目のみ表示 -->
                    <img src="{{ asset($message->message_img1)}}" alt="">
                    <!-- リレーションしたnameを表示 -->
                    <p>名前</p>
                </div>

                <!-- メッセージ表示 -->
                <div class="top-text">
                    <p>{{ $message->message }}</p>
                </div>

                <!-- いつ投稿したのか表示 -->
                <div class="top-created">
                    <p>{{ $message->created_at }}</p>
                </div>
            </a>
        <!-- 繰り返し終わり -->
        @endforeach
        @endforeach
        <!-- ページネーション -->
            <div class="paging">
                <form action="" method="post">
                {{ $messages->links('pagination::semantic-ui') }}
                </form>
            </div>

        </div>
    </div>
</section>
</div>

@endsection