@extends('topLayout')

@section('top-layout')
<!-- メールでパスワードリセット -->
<div class="background">
<section>
    <div class="reset">
        <h2>パスワード再設定メール送信フォーム</h2>
        <span class="error" style="color:red; font-size: 12px;">登録しているメールアドレスにパスワード再設定メールを送信します。</span>
        <br>
        <span class="error" style="color:red; font-size: 12px;">そちらからメールアドレスの再設定を行なってください。</span>
        <!-- バリデーション後resetend.phpへ -->
        <form  method="POST" action="{{ route('password_reset.email.send') }}">
            @csrf
            <!-- ユーザー名とアドレスが合っているか確認 -->
            <!-- <div class="checkname">
                <p>ユーザーネーム：</p>
                    <input type="text" name="checkname" value="{{ old('checkname') }}">
            </div> -->

            @error('email')
                <span class="error" style="color:red; font-size: 12px;">{{ $message }}</span>
            @enderror

            <div class="checkemail">
                <p>メールアドレス：</p>
                <input type="email" id="email" name="checkemail" value="{{ old('checkemail') }}">
            </div>

            <!-- <div class="checkpass">
                <p>新たなパスワード：</p>
                <input type="text" name="checkpass" value="{{ old('checkpass') }}">
            </div> -->

            <div class="checkcomp">
                <button type="submit" onclick="comfirm('リセットメールを送信しますか？')">送信</button>
            </div>
        </form>
    </div>
</section>
</div>

@endsection