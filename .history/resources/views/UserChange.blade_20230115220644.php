@extends('Layout')

@section('layout')

<div class="background">
<section>
    <!-- バリデーション後changecomp.phpへ -->
    <h2>登録情報変更画面</h2>
    <!-- changecompへ遷移 idはユーザーを変更するためユーザーidをとる -->
    {{dd($user->id)}}
    <form action="change/{$user->id}" method="POST" enctype='multipart/form-data'>
    @csrf
    <!-- エラー表記foreach -->
        <!-- <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul> -->
        <span style="color:red; font-size: 12px;">{{ session('error') }}</span>
        <!-- バリデーションエラーであれば表示 -->
        <div class="userchange">
            @if($errors->has('changename'))
                <span style="color:red; font-size: 12px;">ユーザーネームが不正です。10文字以内で入力してください。</span>
            @endif

            <!-- 変更するnameを入力　初めに変更前のnameを表示 -->
            <div class="namechange">
                <p><span style="color:red;">*</span>ユーザーネーム:</p>
                <input type="text" name="changename" value="{{ $user->name }}">
            </div>
            <!-- バリデーションエラーであれば表示 -->
            @if($errors->has('changeemail'))
                <span style="color:red; font-size: 12px;">メールアドレスが不正です。もう一度入力してください。</span>
            @endif
            <!-- 変更するemailを入力　初めに変更前のemailを表示 -->
            <div class="emailchange">
                <p><span style="color:red;">*</span>メールアドレス:</p>
                <input type="email" name="changeemail" value="{{ $user->email }}">
            </div>

            <!-- バリデーションエラーであれば表示 -->
            @if($errors->has('changeimg'))
                <span style="color:red; font-size: 12px;">画像が不正です。jpegもしくはpngで指定してください。</span>
            @endif

            <!-- 変更するimgを入力 -->
            <div class="imgchange">
                <input type="file" name="changeimg" accept="image/jpeg, image/png">
            </div>

            <div class="passchange">
            <!-- バリデーションエラーであれば表示 -->
            @if(isset($errordate))
                <span style="color:red; font-size: 12px;">パスワードが違います。もう一度パスワードの確認をお願いします。</span>
            @endif
                <!-- パスワードの確認 セキュリティの観点から表示はしない　-->
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