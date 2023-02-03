@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>投稿にコメントします</h2>
    <div class="comment-sources">
    <!-- ユーザーアイコン表示 -->
        <div class="comment-source">
            <img src="{{ asset('images/S__67870726.jpg') }}" alt="">
        <!-- 登録されているユーザーネーム  -->
            <h4>{{ $userDate->name }}</h4>
        </div>

        <!-- <div class="user-detail">
        登録されているユーザーネーム 
            <h4>登録されているユーザーネーム</h4>
        </div> -->

        <div class="detail-text">
        <!-- 登録されている本文表示 -->
            <p>{{ $messages->message }}</p>
        </div>
    </div>

    <div class="comment-maintext">
    <!-- 登録後詳細画面へ -->
        <form action="" method="post">
            <div class="comment-post">
                <textarea name="comment" style="font-size: 20px;" id="" cols="30" rows="10" placeholder="投稿にコメントします。コメントを入力してください。"></textarea>
            </div>

            <div class="comment-button">
                <button type="submit" onclick="return confirm('コメントは投稿後編集できません。投稿しますか？');">コメントする</button>
            </div>
        </form>
    </div>
</section>
</div>

@endsection