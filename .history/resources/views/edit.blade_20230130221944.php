@extends('topLayout')

@section('top-layout')
<div class="background">
    <section>
        <div class="edit">
            <h1 class="title" id="edittext">新しいパスワードを設定</h1>
            <form method="POST" action="{{ route('password_reset.update') }}">
                @csrf
                <!-- user_tokensテーブルのtokenを取得 -->
                <input type="hidden" name="reset_token" value="{{ $userToken->token }}">

                <div class="input-group">

                    <label for="password" class="label editlavel">パスワード:</label>
                    <input type="password" name="password" class="input {{ $errors->has('password') ? 'incorrect' : '' }}">

                    @error('password')
                        <div class="error" style="color:red; font-size:12px;">{{ $message }}</div>
                    @enderror

                    @error('token')
                        <div class="error" style="color:red; font-size:12px;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password_confirmation" class="label editlavel">パスワードを再入力:</label>
                    <input type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'incorrect' : '' }}">
                </div>
                <button type="submit">パスワードを再設定</button>
            </form>
        </div>
    </section>
</div>
@endsection