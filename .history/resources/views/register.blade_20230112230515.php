@extends('topLayout')

@section('top-layout')
<!-- 会員登録画面 -->
<div class="background">
<section>
    <div class="register">
        <!-- regicompへ遷移 -->
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 style="margin-top: 50px; text-align: center;">会員登録</h2>
            <div class="register-menu">
                <div class="regi-date">
                    <p><span style="color:red;">*</span>ユーザーネーム：</p>
                    <input type="text" name="reginame" value="{{ old('reginame') }}">
                </div>
                <!-- バリデーションエラーで表示 -->
                    @if($errors->has('reginame'))
                    <span style="color:red; font-size: 12px;">入力した値が不正、もしくは既に登録されています。ユーザーネームは10文字以内で作成してください。</span>
                    @endif

                <div class="regi-date">
                    <p><span style="color:red;">*</span>メールアドレス：</p>
                    <input type="email" name="regiemail" value="{{ old('regiemail')}}">
                </div>
                    @if($errors->has('regiemail'))
                    <span style="color:red; font-size: 12px;">メールが不正、もしくは既に登録されています。正しいアドレスを入力してください。</span>
                    @endif
                <div class="regi-date">
                    <p><span style="color:red;">*</span>パスワード：</p>
                    <input type="password" name="regipass" value="{{ old('regipass') }}">
                </div>
                    @if($errors->has('regipass'))
                    <span style="color:red; font-size: 12px;">パスワードが不正です。6文字以上12文字以内で指定してください。</span>
                    @endif

                <div class="regi-img">
                    <input type="file" name="regiimg" accept="image/jpeg, image/png" value="{{ old('regiimg') }}">
                    <!-- <input type="file" name="regiimg"> -->
                </div>
                    <!-- ifで表示・非表示切り替え -->
                        @if($errors->has('regiimg'))
                        <span style="color:red; font-size: 12px;">画像が不正です。jpegもしくはpngで指定してください。</span>
                        @endif
                    <!-- if終わり -->

                <div class="regi-button">
                <!-- バリデーション後regicomp.phpへ遷移  -->
                    <button type="submit">登録</button>
                </div>
            </div>
        </form>
    </div>
</section>
</div>

@endsection