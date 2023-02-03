@extends('Layout')

@section('layout')


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
</tbody>
<br>
<br>
</table>
@endforeach

<p>現在のユーザー数：</p>
<p>{{ $users->count }}</p>

{!! $users->links('pagination::semantic-ui') !!}
@endsection