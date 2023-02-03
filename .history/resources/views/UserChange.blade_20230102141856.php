@extends('Layout')

@section('layout')

<div class="background">
<section>
    <!-- バリデーション後changecomp.phpへ -->
    <h2>登録情報変更画面</h2>
    <!-- changeconpへ遷移 -->
    <form action="{{ route('userchange') }}" method="post" enctype=“multipart/form-data”>
    @csrf
        @if(isset($errordate))
            <span style="color:red; font-size: 12px;">パスワードが違います。もう一度パスワードの確認をお願いします。</span>
        @endif

        <div class="userchange">
            <div class="namechange">

                @if($errors->has('changename')))
                    <span style="color:red; font-size: 12px;">ユーザーネームが不正です。10文字以内で入力してください。</span>
                @endif
                <p><span style="color:red;">*</span>ユーザーネーム:</p>
                <input type="text" name="changename" value="{{ $users->name }}">
            </div>

            <div class="emailchange">
                @if($errors->has('changeemail')))
                    <span style="color:red; font-size: 12px;">メールアドレスが不正です。10文字以内で入力してください。</span>
                @endif
                <p><span style="color:red;">*</span>メールアドレス:</p>
                <input type="email" name="changeemail" value="{{ $users->email }}">
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