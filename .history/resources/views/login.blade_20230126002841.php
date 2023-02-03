@extends('topLayout')

@section('top-layout')

<div class="background">
<section>
    <div class="login">
        <!-- ルートで登録されているものと相違ないか確認必要。確認はコントローラーで -->
        <form action="{{ route('list.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 style="margin-top: 50px; text-align: center;">ログイン</h2>
            <!-- ログイン時情報のないnameとpassの場合エラーで以下を表示 -->
                    <span style="color:red; font-size: 12px;">{{ session('error') }}</span>

            <div class="login-date">
                <div class="user-name">
                    <h3>ユーザー名：</h3>
                    <input type="text" name="loginname" value="{{ old('loginname') }}" placeholder="ニックネームを入力">
                </div>
                <!-- バリデーションで不正時 -->
                @if($errors->has('loginname'))
                <span style="color:red; font-size: 12px;">ユーザー名が不正です。</span>
                @endif

                <div class="user-password">
                    <h3>パスワード：</h3>
                    <input type="password" name="loginpass" value="{{ old('loginpass') }}" placeholder="パスワードを入力">
                </div>
                <!-- バリデーションで不正時 -->
                @if($errors->has('loginpass'))
                    <span style="color:red; font-size: 12px;">登録パスワードが不正です。</span>
                @endif

                <div class="login-button">
                    <button type="submit">ログイン</button>
                </div>
                @if($useradmin === '91199119')
                    <p>大丈夫か</p>
                @endif
                <div class="reset-move">
                    <!-- パスワードを忘れた方　変更画面へ移行 -->
                    <a href="{{ route('password_reset.email.form') }}">パスワードをお忘れですか？</a>
                </div>
            </div>
        </form>
    </div>
</section>
</div>

@endsection