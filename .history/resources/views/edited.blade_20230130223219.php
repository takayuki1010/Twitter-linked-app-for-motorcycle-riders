@extends('topLayout')

@section('top-layout')
    <div>
        <div class="background">
            <section>
                <div class="resetend">
                    <div class="resetend-nemu">
                        <h1>パスワードリセットが完了しました</h1>
                        <br>
                        <p style="color:red;">ログイン画面からログインしてください。</p>
                        <br>
                        <a href="{{ route('login') }}"></a>
                    </div>
                </div>
            </session>
        </div>
    </div>
@endsection