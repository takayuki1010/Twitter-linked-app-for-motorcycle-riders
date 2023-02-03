@extends('Layout')

@section('layout')


@foreach( as )
<table class="table">
<tbody>
<tr>
<th>ユーザー名：</th>
<td>ユーザー名出力場所</td>
</tr>
<tr>
<th>登録日：</th>
<td>登録した日にち出力</td>
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