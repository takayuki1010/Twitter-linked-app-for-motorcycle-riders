@extends('Layout')

@section('layout')

<div class="background">
<section>
    <div class="reset">
        <h2>パスワードリセット</h2>
        <!-- バリデーション後resetend.phpへ -->
        <form  method="POST" action="{{ route('reset.update') }}">
            <!-- ユーザー名とアドレスが合っているか確認 -->
            <div class="checkname">
                <p>ユーザーネーム：</p>
                    <input type="text" name="checkname" value="{{ old('checkname') }}">
            </div>

            <div class="checkemail">
                <p>メールアドレス：</p>
                <input type="email" name="checkemail" value="{{ old('checkemail') }}">
            </div>

            <div class="checkpass">
                <p>新たなパスワード：</p>
                <input type="text" name="checkpass" value="{{ old('checkpass') }}">
            </div>

            <div class="checkcomp">
                <button type="submit" onclick="comfirm('パスワードをリセットしてもよろしいですか？')">リセットしますか？</button>
            </div>
        </form>
    </div>
</section>
</div>

@endsection