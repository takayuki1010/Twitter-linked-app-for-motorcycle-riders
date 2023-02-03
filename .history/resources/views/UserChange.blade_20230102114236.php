@extends('Layout')

@section('layout')

<div class="background">
<section>
    <!-- バリデーション後changecomp.phpへ -->
    <h2>登録情報変更画面</h2>
    <!-- changeconpへ遷移 -->
    <form action="{{ route('changeconp') }}" method="post" enctype=“multipart/form-data”>
        <div class="userchange">
            <div class="namechange">
                <p><span style="color:red;">*</span>ユーザーネーム:</p>
                <input type="text" name="changename" value="{{ old('changename') }}">
            </div>

            <div class="emailchange">
                <p><span style="color:red;">*</span>メールアドレス:</p>
                <input type="email" name="changeemail" value="{{ old('changeemail') }}">
            </div>

            <div class="imgchange">
                <input type="file" name="changeimg" value="画像選択">
            </div>

            <div class="passchange">
                <!-- パスワード確認 -->
                <p>確認の為登録しているパスワードを入力してください。</p>
                <div class="passchange-note">
                    <p><span style="color:red;">*</span>パスワード:</p>
                    <input type="password" name="changepass" value="{{ old('changepass') }}">
                </div>
            </div>

            <div class="change-button">
                <button type="submit" onclick="confirm('編集を確定しますか？')">変更を確定する</button>
            </div>
        </div>
    </form>
</section>
</div>

@endsection