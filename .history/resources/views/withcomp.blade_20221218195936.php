@extends('Layout')

@section('layout')

<section>
    <div class="withcomp">
        <div class="withcomp-menu">
            <h3 style="color:red;">退会が完了しました。</h3>
            <p>退会完了しました。<br>またの利用をお待ちしています。</p>

            <a class="button" href="{{ route('login') }}">ログイン画面へ</a>
        </div>
    </div>
</section>

@endsection