@extends('Layout')

@section('layout')

<div class="background">
<section>
    <h2>投稿にコメントします</h2>
    <div class="comment-sources">
    <!-- ユーザーアイコン表示 -->
        <div class="comment-source">
            <img src="{{ asset($messageuser->img) }}" alt="">
        <!-- 登録されているユーザーネーム  -->
            <h4>{{ $messageuser->name }}</h4>
        </div>

        <div class="detail-text">
        <!-- 登録されている本文表示 -->
            <p>{{ $messages->message }}</p>
        </div>
    </div>

    <div class="comment-maintext">
    <!-- 登録後詳細画面へ -->
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf

            <!-- 投稿するメッセージのID -->
            <input type="hidden" name="messageid" value="{{$messageuser->id}}">
            {{dd($messege->id)}}
            <!-- コメントがエラーであれば表示 -->
            @if($errors->has('comment'))
                <span style="color:red; font-size: 12px; margin: 5px 0px;">投稿した文章が不正です。１４０文字以内で投稿してください。</span>
            @endif

            <!-- 投稿のid -->
            <input type="hidden" name="user_id" value="{{ $user->id }}">


            <div class="comment-post">
                <textarea name="comment" style="font-size: 18px;" id="" cols="30" rows="10" placeholder="投稿にコメントします。コメントを入力してください。"></textarea>
            </div>

            <div class="comment-button">
                <button type="submit" onclick="return confirm('コメントは投稿後編集できません。投稿しますか？');">コメントする</button>
            </div>
        </form>
    </div>
</section>
</div>

@endsection