@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>sns投稿</h2>
    <!-- メッセージ投稿画面　データベース登録後list.phpへ遷移 -->
    <div class="posts">
        <form action="" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="post-top">
                <div class="post-icon">
                <!-- ユーザーアイコン -->
                    <img src="" alt="">
                    <div class="post-name">
                        <!-- ユーザー名 -->
                        <p></p>
                    </div>
                    <div class="post-post">
                        <!-- 投稿ボタン -->
                        <button type="submit">投稿</button>
                    </div>
                </div>

                <!-- <div class="post-name">
                    <p>投稿する人のユーザーネーム</p>
                </div> -->

                <!-- <div class="post-post">
                    <button type="submit">投稿</button>
                </div> -->
            </div>

            <div class="error" style="text-align: center; margin-top: 5px;">
                @if($errors->has('PostText'))
                    <span style="color:red; font-size: 12px;">投稿内容が不正です。140文字以内で記入してください。</span>
                @endif
            </div>

            <div class="post-text">
                <textarea name="PostText" id="" cols="30" rows="10" value="登録する内容">{{ old('PostText') }}</textarea>
            </div>

            <div class="posts-img">
                @if($errors->has('postimg'))
                    <span style="color:red; font-size: 12px;">投稿した画像が不正です。jpeg、もしくはpngを投稿してください。</span>
                @endif
                
                <span style="color:red; font-size: 12px;"></span>
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