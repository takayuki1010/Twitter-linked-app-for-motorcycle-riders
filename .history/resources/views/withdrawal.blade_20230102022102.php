@extends('Layout')

@section('layout')

<div class="background">
<!-- 情報があっており、その状態でボタンを押すとデータを削除 -->
<section>
    <h2>退会情報入力画面</h2>
    <form action="{{ route('withcomp') }}" method="post">
        @csrf
        <div class="withdrawal">
            @if($errors->has('withname'))
                <span style="color:red; font-size: 12px;">ユーザーネームが不正です。登録しているユーザーネームを入力してください。</span>
            @endif

            @if($errors->has('withemail'))
                <span style="color:red; font-size: 12px;">メールアドレスが不正です。登録しているメールアドレスを入力してください。</span>
            @endif

            @if($errors->has('withpass'))
                <span style="color:red; font-size: 12px;">パスワードが不正です。登録しているパスワードを入力してください。</span>
            @endif
            <div class="withdrawalName">
                <p>ユーザーネーム：</p>
                <input type="text" name="withname" value="{{ old('withname') }}">
            </div>

            <div class="withdrawalEmail">
                <p>メールアドレス：</p>
                <input type="email" name="withemail" value="{{ old('withemail') }}">
            </div>

            <div class="withdrawalPass">
                <p>パスワード：</p>
                <input type="password" name="withpass" value="{{ old('withpass') }}">
            </div>

            <div class="withdrawalButton">
                <button type="submit" onclick="comfirm('本当に退会してもいいですか？')">退会します</button>
            </div>

            <div class="withdrawal_note">
                <p>退会すると登録されていた会員情報が削除されます。一度退会すると元には戻りません。</p>
            </div>
        </div>

        
    </form>
</section>
</div>

@endsection