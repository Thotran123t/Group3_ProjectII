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

@foreach($macbook->category->images as $image)
@if($image->id_color == $macbook->id_color)
<img src="{{asset($image->path)}}" alt="">
@endif
@endforeach

<h1>Name : {{$macbook->name}}</h1>
<h3>Color : {{$macbook->color->name}}</h3>
<h3>Ram : {{$macbook->ram->name}}</h3>
<h3>Capacity : {{$macbook->capacity->name}}</h3>
<h3>Price : {{$macbook->price}}</h3>
<input class="quantity" type="number" max="{{$macbook->quantity}}" >
<button class="addtocart">Add To Cart</button>

@endsection


@section('myjs')
<script>
    const id = "{{$macbook->id}}";
    const cate = "{{$macbook->category->name}}";
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
                    alert('add to cart successfully!');
                }
            });


        });
    });
</script>
@endsection