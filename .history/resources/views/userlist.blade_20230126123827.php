@extends('Layout')

@section('layout')

<div class="background">
    <section>
        <a class="button" href="{{ route('list.index') }}">投稿一覧へ</a>
        @foreach($users as $user)
        <table class="table">
        <tbody>
        <tr>
        <th>ユーザー名：</th>
        <td>{{ $user->name }}</td>
        </tr>
        <tr>
        <th>登録日：</th>
        <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
        <th>メールアドレス：</th>
        <td>{{ $user->email }}</td>
        </tr>
        <tr>
        <th>投稿数：</th>
        <td>{{ $user->created_at }}</td>
        </tr>
        </tbody>
        <br>
        </table>
        @endforeach
        <br>

            <p>現在のユーザー数：</p>
            <p>{{ $users->count() }}</p>

            {!! $users->links('pagination::semantic-ui') !!}
    </section>
</div>

@endsection