@extends('frontend/layout/layout')
@section('mycss')
@endsection

@section('contents')
<h1>cart page</h1>
<form action="{{route('checkout')}}">
    <button type="submit">checkout</button>
</form>
@endsection

@section('myjs')
@endsection