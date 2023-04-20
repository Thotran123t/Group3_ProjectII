@extends('frontend/layout/layout')
@section('mycss')
@endsection



@section('contents')
<style>
    img {
        max-width: 250px;
        height: auto;
    }
</style>
@foreach($product->category->images as $image)
@if($image->id_color == $product->id_color)
<img src="{{asset($image->path)}}" alt="">
@endif
@endforeach

<h1>Name : {{$product->name}}</h1>
<h3>Color : {{$product->color->name}}</h3>
<h3>Ram : {{$product->ram->name}}</h3>
<h3>Capacity : {{$product->capacity->name}}</h3>
<h3>Price : {{$product->price}}</h3>
<input class="quantity" type="number" max="{{$product->quantity}}">
<button class="addtocart">Add To Cart</button>

@endsection


@section('myjs')
<script>
    const id = "{{$product->id}}";
    const cate = "{{$product->category->name}}";
    const urladd = "{{route('add_to_cart')}}";
    $(document).ready(function() {
        $('.addtocart').click(function(e) {
            e.preventDefault();
            let quantity = $('.quantity').val();
            $.ajax({
                type: 'post',
                url: urladd,
                data: {
                    id: id,
                    quantity: quantity,
                    category: cate,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // alert('add to cart successfully !');
                    alert(data.info);

                }
            });


        });
    });
</script>
@endsection