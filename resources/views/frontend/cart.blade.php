@extends('frontend/layout/layout')
@section('mycss')
@endsection

@section('contents')
<h1>cart page</h1>
<table>
    <thead>
        <th>img</th>
        <th>name</th>
        <th>quantity</th>
        <th>price</th>
        <th>action</th>
        <th>total</th>
    </thead>
    <tbody>
        @if(isset($cart))
        @foreach($cart as $item)
        <tr>
            <td>
                @foreach($item->product->image as $key => $image)
                @if($key == 0)
                <img src="{{ asset($image->path) }}" alt="" width="50" height="50">
                @break
                @endif
                @endforeach
            </td>
            <td>{{$item->product->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->product->price}}</td>
            <td>
                <form action="{{route('remove_cart',$loop->index)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Delete</button>
                </form>
            </td>
            <td>all</td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot></tfoot>
</table>
<form action="{{route('checkout')}}">
    <button type="submit">checkout</button>
</form>
@endsection

@section('myjs')
@endsection