@extends('topLayout')

@section('top-layout')
<div class="background">
    <section>
        <div style="height: 65vh;">
            <h1 class="title">新しいパスワードを設定</h1>
            <form method="POST" action="{{ route('password_reset.update') }}">
                @csrf
                <!-- user_tokensテーブルのtokenを取得 -->
                <input type="hidden" name="reset_token" value="{{ $userToken->token }}">

                <div class="input-group">

                    <label for="password" class="label">パスワード:</label>
                    <input type="password" name="password" class="input {{ $errors->has('password') ? 'incorrect' : '' }}">

                    @error('password')
                        <div class="error" style="color:red; font-size:12px;">{{ $message }}</div>
                    @enderror

                    @error('token')
                        <div class="error" style="color:red; font-size:12px;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password_confirmation" class="label">パスワードを再入力:</label>
                    <input type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'incorrect' : '' }}">
                </div>
                <button type="submit">パスワードを再設定</button>
            </form>
        </div>
    </section>
</div>
@endsection