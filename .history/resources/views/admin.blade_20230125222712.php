@extends('topLayout')

@section('top-layout')

<div class="background">
    <section>
        <div  style="hight: 600vh;">
        <form action="">
            <p>管理者名</p>
            <input type="text" name="adminname" value="{{ old('adminname') }}">

            <p>登録メールアドレス</p>
            <input type="email" name="adminemail" value="{{ old('adminemail') }}">

            <p>パスワード</p>
            <input type="password" name="adminpass">
        </form>
        </div>
    </section>
</div>

@endsection