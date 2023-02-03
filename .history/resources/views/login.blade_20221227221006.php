@extends('topLayout')

@section('top-layout')

<div class="background">
<section>
    <div class="login">
        <!-- ルートで登録されているものと相違ないか確認必要。確認はコントローラーで -->
        <form action="{{ route('login-comp')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 style="margin-top: 50px; text-align: center;">ログイン</h2>

            <div class="login-date">
                <div class="user-name">
                    <h3>メールアドレス：</h3>
                    <input type="text" name="loginemail" value="{{ old('loginemail') }}" placeholder="メールアドレスを入力">
                </div>
                @if($errors->has('loginemail'))
                <span style="color:red; font-size: 12px;">メールアドレスが違います。</span>
                @endif

                <div class="user-password">
                    <h3>パスワード：</h3>
                    <input type="password" name="loginpass" value="{{ old('loginpass') }}" placeholder="パスワードを入力">
                </div>
                @if($errors->has('loginpass'))
                <span style="color:red; font-size: 12px;">登録パスワードが不正です。</span>
                @endif

                <div class="login-button">
                    <button type="submit">ログイン</button>
                </div>
                
                <div class="reset-move">
                    <a href="{{ route('reset') }}">パスワードをお忘れですか？</a>
                </div>
            </div>
        </form>
    </div>
</section>
</div>

@endsection