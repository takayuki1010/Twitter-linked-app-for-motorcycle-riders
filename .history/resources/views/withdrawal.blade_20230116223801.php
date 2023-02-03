@extends('Layout')

@section('layout')

<div class="background">
<!-- 情報があっており、その状態でボタンを押すとデータを削除 -->
<section>
    <h2>退会情報入力画面</h2>
    <!-- 退会完了画面へ -->
    <form action="{{ route('delete.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="withdrawal">
            <!-- 入力した情報が違えば表示　変数に情報を入力　入力されていれば -->
            {{ session('error') }}
                <span style="color:red; font-size: 12px;">入力情報が違います。</span>


            <!-- 登録されているnameが合っているか　-->
            <div class="withdrawalName">
                <p>ユーザーネーム：</p>
                <input type="text" name="withname" value="{{ old('withname') }}">
            </div>
            <!-- バリデーションエラーがあれば表示 -->
            @if($errors->has('withname'))
                <span style="color:red; font-size: 12px;">ユーザーネームが不正です。登録しているユーザーネームを入力してください。</span>
            @endif

            <!-- 登録されているメールアドレスか確認 -->
            <div class="withdrawalEmail">
                <p>メールアドレス：</p>
                <input type="email" name="withemail" value="{{ old('withemail') }}">
            </div>
            <!-- バリデーションエラーがあれば表示 -->
            @if($errors->has('withemail'))
                <span style="color:red; font-size: 12px;">メールアドレスが不正です。登録しているメールアドレスを入力してください。</span>
            @endif

            <!-- 登録されているパスワードか確認 -->
            <div class="withdrawalPass">
                <p>パスワード：</p>
                <input type="password" name="withpass" value="{{ old('withpass') }}">
            </div>
            <!-- バリデーションエラーがあれば表示 -->
            @if($errors->has('withpass'))
                <span style="color:red; font-size: 12px;">パスワードが不正です。登録しているパスワードを入力してください。</span>
            @endif

            <!-- 押下で登録ユーザーを物理削除 -->
            <div class="withdrawalButton">
                <button type="submit" onclick="confirm('本当に退会してもいいですか？')">退会します</button>
            </div>

            <div class="withdrawal_note">
                <p>退会すると登録されていた会員情報が削除されます。一度退会すると元には戻りません。</p>
            </div>
        </div>

        
    </form>
</section>
</div>

@endsection