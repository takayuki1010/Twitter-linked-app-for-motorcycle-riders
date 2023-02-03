@extends('topLayout')

@section('top-layout')

<div class="background">
    <section>
        {{ dd(Auth::user) }} 
        <div  style="height: 60vh;">
        <form action="{{ route('zzzadminaaa.store') }}">
            <h3>管理者ログイン</h3>
            <p>管理者名</p>
            <input type="text" name="adminname" value="{{ old('adminname') }}">

            <p>登録メールアドレス</p>
            <input type="email" name="adminemail" value="{{ old('adminemail') }}">

            <p>パスワード</p>
            <input type="password" name="adminpass">

            <button type="submit">送信</button>
        </form>
        </div>
    </section>
</div>

@endsection