@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>sns投稿</h2>
    <!-- データベース登録後list.phpへ遷移 -->
    <div class="posts">
        <form action="{{ route('post_post') }}" method="post" enctype=“multipart/form-data”>
            <div class="post-top">
                <div class="post-icon">
                <!-- ユーザーアイコンのimg -->
                    <img src="{{ asset('images/S__67870726.jpg') }}" alt="">
                    <div class="post-name">
                        <p>投稿する人のユーザーネーム</p>
                    </div>
                    <div class="post-post">
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

            <div class="post-text">
                <textarea name="PostText" id="" cols="30" rows="10" value="登録する内容"></textarea>
            </div>

            <div class="posts-img">
                <div class="ImgPost">
                    <input type="file" value="画像を選択" name="">
                </div>
                <div class="ImgPost">
                    <input type="file" value="画像を選択" name="">
                </div>
            </div>
        </form>
    </div>
</section>
</div>

@endsection