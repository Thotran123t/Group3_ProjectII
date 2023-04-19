@extends('frontend/layout/layout')
@section('mycss')
@endsection
<style>
    img {
        width: 250px;
        height: 250px;
    }

    .product {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }
</style>
@section('contents')
<h1>shop page</h1>
<div class="product">

    @foreach($product as $item)
    <div class="item" onclick="submitForm('{{$item->id}}','{{$item->id_category}}')">
        <form id="form-{{ $item->id.'_'.$item->id_category }}" action="{{ route('product.show', $item->id) }}" method="GET">
            @foreach($item->image as $key => $image)
            @if($key == 0)
            <img src="{{ asset($image->path) }}" alt="">
            @break
            @endif
            @endforeach
            <h1>{{$item->name}}</h1>
            <h1>{{$item->price}}</h1>
        </form>
    </div>
    @endforeach

    @foreach($macbook as $item)
    <div class="item" onclick="submitForm('{{$item->id}}','{{$item->id_category}}')">
        <form id="form-{{ $item->id.'_'.$item->id_category }}" action="{{ route('macbook.show', $item->id) }}" method="GET">
            @foreach($item->image as $key => $image)
            @if($key == 0)
            <img src="{{ asset($image->path) }}" alt="">
            @break
            @endif
            @endforeach
            <h1>{{$item->name}}</h1>
            <h1>{{$item->price}}</h1>
        </form>
    </div>
    @endforeach

    @foreach($appwatch as $item)
    <div class="item" onclick="submitForm('{{$item->id}}','{{$item->id_category}}')">
        <form id="form-{{ $item->id.'_'.$item->id_category }}" action="{{ route('appwatch.show', $item->id) }}" method="GET">
            @foreach($item->image as $key => $image)
            @if($key == 0)
            <img src="{{ asset($image->path) }}" alt="">
            @break
            @endif
            @endforeach
            <h1>{{$item->name}}</h1>
            <h1>{{$item->price}}</h1>
        </form>
    </div>
    @endforeach
    
</div>
@endsection

@section('myjs')
<script>
    function submitForm(itemId,itemCate) {
        document.getElementById("form-" + itemId+'_'+itemCate).submit();
    }
</script>

@endsection