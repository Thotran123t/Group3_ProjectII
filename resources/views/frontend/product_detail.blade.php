@extends('frontend/layout/layout')
@section('mycss')
@endsection
<style>
    img {
        width: 250px;
        height: 250px;
    }
</style>


@section('contents')
<h1>prodcut detail</h1>
@foreach($product->image as $image)
<img src="{{ asset($image->path) }}" alt="">
@endforeach
<h1>{{$product->name}}</h1>
<h3>{{$product->price}}</h3>
<input type="number" class="quantity" max="{{$product->quantity}}">
<select name="color" id="">
    <option value="1">red</option>
    <option value="2">blue</option>
    <option value="3">black</option>
</select>
<select name="capacity" id="">
    <option value="1">32gb</option>
    <option value="2">128gb</option>
    <option value="3">254gb</option>
</select>

<button class="addtocart">Add To cart</button>


<h1>Description</h1>
<p>{{$product->description}}</p>


<h1>Review</h1>
@foreach($product->comment as $comment)
<div>
    <h3>{{$comment->customer->first_name.' '.$comment->customer->last_name}}</h3>
    <p>{{$comment->content}}</p>
</div>
<h1>Add Your Review</h1>

@endforeach
@endsection


@section('myjs')
<script>
    const pid = "{{ $product->id}}";
    const cate = "{{ $product->id_category}}";
    const urladd = "{{route('add_to_cart')}}";
    $(document).ready(function() {
        $('.addtocart').click(function(e) {
            e.preventDefault();
            let quantity = $('.quantity').val();

            $.ajax({
                type: 'post',
                url: urladd,
                data: {
                    id: pid,
                    quantity: quantity,
                    category:cate,
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