@extends('Layout')

@section('layout')

<section>
    <div class="changecomp">
        <div class="changemenu">
            <h3 style="color: red;">ユーザー情報変更完了しました。</h3>
            <p>情報の変更が完了しました。</p>
            <button href="{{ route('list') }}">投稿画面一覧へ</button>
        </div>
    </div>
</section>

@encsection