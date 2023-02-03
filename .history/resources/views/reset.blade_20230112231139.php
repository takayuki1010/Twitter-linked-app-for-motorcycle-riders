@extends('Layout')

@section('layout')

<div class="background">
<section>
    <div class="reset">
        <h2>パスワードリセット</h2>
        <!-- バリデーション後resetend.phpへ -->
        <form action="" action="POST">
            <!-- ユーザー名とアドレスが合っているか確認 -->
            <div class="checkname">
                <p>ユーザーネーム：</p>
                <input type="text" name="" value="">
            </div>

            <div class="checkemail">
                <p>メールアドレス：</p>
                <input type="email" name="" value="">
            </div>

            <div class="checkpass">
                <p>新たなパスワード：</p>
                <input type="text" name="" value="">
            </div>

            <div class="checkcomp">
                <button type="submit" onclick="comfirm('パスワードをリセットしてもよろしいですか？')">リセットしますか？</button>
            </div>
        </form>
    </div>
</section>
</div>

@endsection