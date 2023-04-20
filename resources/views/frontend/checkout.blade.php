@extends('frontend/layout/layout')
@section('mycss')
@endsection

@section('contents')
<style>
    .flex{
        display: flex;
        justify-content: space-around;
    }
</style>
<h1>checkout page</h1>
<div class="flex">
    <div class="infouser">
        <h1>Billing Details</h1>

        <h3>First_name</h3>
        <input type="text" value="{{$user->first_name}}">
        <h3>Last_name</h3>
        <input type="text" value="{{$user->last_name}}">
        <h3>Email</h3>
        <input type="email" value="{{$user->email}}">
        <h3>Address</h3>
        <input type="text" value="{{$user->address}}">
        <h3>Phone</h3>
        <input type="text" value="{{$user->phone}}">
    </div>

    <div class="infopro">
        <h2>hello</h2>
    </div>
</div>



@endsection


@section('myjs')
@endsection