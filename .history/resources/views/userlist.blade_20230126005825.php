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
<td>{{ $user->}}</td>
</tr>
<tr>
<th>電話番号</th>
<td>12-3456-7890</td>
</tr>
<tr>
<th>FAX</th>
<td>12-3456-7890</td>
</tr>
</tbody>
</table>
@endforeach

@endsection