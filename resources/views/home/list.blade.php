@extends('layouts.head')

@section('content')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<div class="container">
    <table>
        <thead>
            <tr>
                <td>S.No</td>
                <td>Name</td>
                <td>Email</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
    @php
        $s_no = 1;
    @endphp
    @foreach ($data as $user)
        <tr>
            <td>{{$s_no++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{route('user', ['id' => encrypt($user->id)])}}" >Edit</a></td>
        </tr>
    @endforeach
        </tbody>
    </table>
</div>
@endsection