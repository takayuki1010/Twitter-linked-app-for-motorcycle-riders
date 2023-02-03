@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>sns投稿</h2>
    <p style="font-size: 12px;">
        一覧で表示されるのは一つ目の画像のみです。一つ目の画像から投稿してください。
        <br>
        １から情報を入力される際は初期内容を消してから入力してください。
    </p>
    <!-- メッセージ投稿画面　データベース登録後list.phpへ遷移 -->
    <div class="posts">
        <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="post-top">
                <div class="post-icon">
                <!-- ユーザーアイコン -->
                    <img src="{{ asset($user->img) }}" alt="">
                    <div class="post-name">
                        <!-- ユーザー名 -->
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="post-post">
                        <!-- 投稿ボタン -->
                        <button type="submit">投稿</button>
                    </div>
                </div>

            </div>

            <div class="error" style="text-align: center; margin-top: 5px;">
            <!-- バリデーションエラーで表示 -->
                @if($errors->has('PostText'))
                    <span style="color:red; font-size: 12px;">投稿内容が不正です。140文字以内で記入してください。</span>
                @endif
            </div>

            <!-- 投稿内容 -->
            <div class="post-text">
                <textarea name="PostText" id="" cols="30" rows="10" placeholder="">
                    name:
                    性別:
                    愛車:
                    一言:
                    {{ old('PostText') }}
                </textarea>
            </div>

            <div class="posts-img">
                <!-- バリデーションエラーで表示 -->
                @if($errors->has('postimg1') || $errors->has('postimg2'))
                    <span style="color:red; font-size: 12px;">投稿した画像が不正です。jpeg、もしくはpngを投稿してください。</span>
                @endif
                
                <span style="color:red; font-size: 12px;">{{ session('error') }}</span>
                <!-- 投稿する画像　二つまで　一覧表示は１番目のみ表示 -->
                <div class="ImgPost">
                    <input type="file" value="{{ old('postimg1') }}" accept="image/jpeg, image/png" name="postimg1">
                </div>
                <div class="ImgPost">
                    <input type="file" value="{{ old('postimg2') }}" accept="image/jpeg, image/png" name="postimg2">
                </div>
            </div>
        </form>
    </div>
</section>
</div>

@endsection