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
        @foreach($users as $user)
        <div class="top-content">
            <a href="{{ route('detail') }}">
                <!-- ユーザーのアイコン -->
                <div class="top-img">
                    <img src="{{ asset($user->img)}}" alt="">
                    <p>{{ $user->name }}</p>
                </div>

                <div class="top-text">
                    <p>( データベースにあるテキストを表示 )</p>
                </div>

                <div class="top-created">
                    <p>{{ $user->created_at }}</p>
                </div>
            </a>
        <!-- 繰り返し終わり -->
        @endforeach
            <div class="paging">
                {{ $users->links('pagination::simple-tailwind') }}
            </div>

        </div>
    </div>
</section>
</div>

@endsection