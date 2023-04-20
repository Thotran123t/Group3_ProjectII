@extends('frontend/layout/layout')
@section('mycss')
@endsection

@section('contents')
<style>
    img {
        max-width: 250px;
        height: auto;
    }

    .product {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }
</style>
<h1>shop page</h1>
<div class="product">

    @foreach($product as $item)
    <div class="item" onclick="submitForm('{{$item->id}}','{{$item->id_category}}')">
    <form id="form-{{ $item->id.'_'.$item->id_category }}" action="{{ route('product_detail', $item->id) }}" method="GET">
            <img src="{{asset($item->image)}}" alt="">
            <h1>{{$item->name}}</h1>
            <h1>{{$item->price}}</h1>
        </form>
    </div>
    @endforeach

    @foreach($macbook as $item)
    <div class="item" onclick="submitForm('{{$item->id}}','{{$item->id_category}}')">
        <form id="form-{{ $item->id.'_'.$item->id_category }}" action="{{ route('macbook_detail', $item->id) }}" method="GET">
            <img src="{{asset($item->image)}}" alt="">
            <h1>{{$item->name}}</h1>
            <h1>{{$item->price}}</h1>
        </form>
    </div>
    @endforeach

    

</div>
@endsection

@section('myjs')
<script>
    function submitForm(itemId, itemCate) {
        document.getElementById("form-" + itemId + '_' + itemCate).submit();
    }
</script>

@endsection