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
<tr>
<th>投稿数</th>
<td>12-3456-7890</td>
</tbody>
<br>
<br>
</table>
@endforeach

@endsection