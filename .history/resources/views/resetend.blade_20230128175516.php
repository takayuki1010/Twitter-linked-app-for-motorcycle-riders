@extends('topLayout')

@section('top-layout')

<div class="background">
    <section>
        <div class="resetend">
            <div class="resetend-nemu">
                <h3 style="color:red;">メール送信しました。</h3>
                <p>メールを確認してください。<br>パスワードリセット後ログインしてください。</p>
                <!-- ログイン画面へ遷移 -->
                <a class="button" href="{{ route('login.index') }}">ログイン画面へ</a>
            </div>
        </div>
    </section>
</div>

@endsection