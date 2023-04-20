@extends('frontend/layout/layout')
@section('mycss')
@endsection



@section('contents')
<style>
    img {
        max-width: 150px;
        height: auto;
    }
</style>




<h1>{{$catename}}</h1>
<div class="check">

</div>
<h3>color</h3>
<select name="color" id="color">
    @foreach($images->unique('id_color') as $item)
    <option value="{{ $item->color->id }}">
        {{ $item->color->name }}
    </option>
    @endforeach
</select>


<h3>ram</h3>
<select name="ram" id="ram">
    @foreach($product->unique('id_ram') as $item)
    <option value="{{ $item->ram->id }}">
        {{$item->ram->name}}
    </option>
    @endforeach
</select>


<h3>capacity</h3>
<select name="capacity" id="capacity">
    @foreach($product->unique('id_capacity') as $item)
    <option value="{{ $item->capacity->id }}">
        {{$item->capacity->name}}
    </option>
    @endforeach
</select>



<button class="addtocart">Add To Cart</button>
@endsection


@section('myjs')
<script>
    $(document).ready(function() {
        var images = @json($images);

        function generateImageHtml(valuecolor) {
            var container = '';
            $.each(images, function(index, value) {
                if (valuecolor == value.id_color) {
                    var imagePath = "{{ asset(':path') }}".replace(':path', value.path);
                    container += '<img src="' + imagePath + '" alt="">';
                }
            });
            return container;
        }
        // Gọi lại hàm generateImageHtml để tạo ra nội dung của div "check" khi trang được tải lần đầu
        $('.check').html(generateImageHtml($('#color').val()));

        // Gọi lại hàm generateImageHtml khi giá trị của select thay đổi
        $('#color').change(function() {
            var valuecolor = $('#color').val();
            $('.check').html(generateImageHtml(valuecolor));
        });


        const urladd = "{{route('add_to_cart')}}";
        $('.addtocart').click(function(e) {
            e.preventDefault();
            let quantity = 1;
            let catename = "{{$catename}}";
            let cateid = "{{$cateid}}";
            let color = $('#color').val();
            let ram = $('#ram').val();
            let capacity = $('#capacity').val();
            $.ajax({
                type: 'post',
                url: urladd,
                data: {
                    
                    quantity: quantity,
                    category: catename,
                    category_id:cateid,
                    color:color,
                    ram:ram,
                    capacity:capacity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert(data.info);
                }
            });


        });

    });
</script>
@endsection