@extends('topLayout')

@section('top-layout')
    <div>
        <div class="background">
            <section>
                <div class="resetend">
                    <div class="resetend-nemu">
                        <h1>パスワードリセットが完了しました</h1>
                        <p style="color:red;">トップのログイン画面からログインしてください。</p>
                        <a class="button" id="editend" href="{{ route('index') }}">トップへ戻る</a>
                    </div>
                </div>
            </session>
        </div>
    </div>
@endsection