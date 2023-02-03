@extends('Layout')

@section('layout')

<div class="background">
<section>
    <!-- バリデーション後changecomp.phpへ -->
    <h2>登録情報変更画面</h2>
    <!-- changeconpへ遷移 -->
    <form action="{{ route('userchange') }}" method="post" enctype=“multipart/form-data”>
    @csrf
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
        <div class="userchange">
            @if($errors->has('changename'))
                <span style="color:red; font-size: 12px;">ユーザーネームが不正です。10文字以内で入力してください。</span>
            @endif
            <div class="namechange">
                <p><span style="color:red;">*</span>ユーザーネーム:</p>
                <input type="text" name="changename" value="{{ $users->name }}">
            </div>

            @if($errors->has('changeemail'))
                <span style="color:red; font-size: 12px;">メールアドレスが不正です。もう一度入力してください。</span>
            @endif
            <div class="emailchange">
                <p><span style="color:red;">*</span>メールアドレス:</p>
                <input type="email" name="changeemail" value="{{ $users->email }}">
            </div>

            @if($errors->has('changeimg'))
                <span style="color:red; font-size: 12px;">画像が不正です。jpegもしくはpngで指定してください。</span>
            @endif
            <div class="imgchange">
                <input type="file" name="changeimg" accept="image/jpeg, image/png">
            </div>

            <div class="passchange">
            @if(isset($errordate))
                <span style="color:red; font-size: 12px;">パスワードが違います。もう一度パスワードの確認をお願いします。</span>
            @endif
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