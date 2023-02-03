@extends('topLayout')

@section('top-layout')
    <div>
        <div class="background">
            <section>
                <div class="resetend">
                    <div class="resetend-nemu">
                        <h1>パスワードリセットが完了しました</h1>
                        <br>
                        <p style="color:red;">トップのログイン画面からログインしてください。</p>
                        <a class="button" href="{{ route('index') }}">トップへ戻る</a>
                    </div>
                </div>
            </session>
        </div>
    </div>
@endsection