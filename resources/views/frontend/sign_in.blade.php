@extends('frontend/layout/layout')
@section('mycss')
@endsection

@section('contents')
<h1>sign-in page</h1>
<form action="{{route('signin_user')}}" method="post">
    @csrf
    <div>
        <label for="firstname">Email : </label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="lastname">Password : </label>
        <input type="password" name="password">
    </div>
    <input type="submit">
</form>
@endsection

@section('myjs')
@endsection