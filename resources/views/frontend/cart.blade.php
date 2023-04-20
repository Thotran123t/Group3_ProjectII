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
        @php
        $total = 0;
        @endphp
        @if(isset($cart))
        @foreach($cart as $item)
        <tr>
            <td>
                <img src="{{ asset($item->product->image) }}" alt="" width="50" height="50">
            </td>
            <td>{{$item->product->name}}</td>
            <td><input type="number"  value="{{$item->quantity}}"></td>
            <td>{{$item->product->price}}</td>
            <td>
                <form action="{{route('remove_cart',$loop->index)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Delete</button>
                </form>
            </td>
            <td>{{$item->product->price*$item->quantity}}</td>
        </tr>
        @php
        $total += $item->product->price*$item->quantity;
        @endphp
        @endforeach
        @endif
    </tbody>
    <tfoot></tfoot>
</table>
<h3>Total : {{$total}}</h3>

<form action="{{route('checkout')}}">
    <button type="submit">checkout</button>
</form>
@endsection

@section('myjs')

@endsection