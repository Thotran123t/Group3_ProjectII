@extends('frontend/layout/layout')
@section('mycss')
@endsection

@section('contents')
<section>
    <h1>ON SELL</h1>
</section>
<section>
    <h1>LATEST PRODUCTS</h1>
</section>
<section>
    <h1>PRODUCT CATEGORIES</h1>
    <div class="category">
        @foreach($category as $item)
        <div class="item" onclick="submitForm('{{$item->name}}')">
            <form id="form-{{$item->name}}" action="{{ route('category_detail', [$item->id, $item->name]) }}" method="GET">
                <img src="{{ asset($item->image) }}" alt="" width="50" height="50">
                <h1>{{$item->name}}</h1>
            </form>
        </div>
        @endforeach
    </div>
</section>
@endsection

@section('myjs')
<script>
    function submitForm(itemCate) {
        document.getElementById("form-" + itemCate).submit();
    }
</script>
@endsection