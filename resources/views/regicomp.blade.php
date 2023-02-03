@extends('topLayout')

@section('top-layout')

<div class="background">
<section>
    <div class="regicomps">
        <div class="regicomp">
            <div class="regicomp-text">
                <h2>登録完了！！</h2>
                <p>登録が完了しました。</p>
                <p>ログイン画面からログインしてください。</p>
            </div>

            <!-- クリックでログイン画面へ遷移 -->
            <div class="comp-button">
                <a class="button" href="{{ route('login.index') }}">ログイン画面へ</a>
            </div>
        </div>
    </div>
</section>
</div>

@endsection
