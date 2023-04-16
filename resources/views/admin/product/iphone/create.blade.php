@extends('admin/layout/layout')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/layouttitle.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/addiphone.css')}}">

@section('mycss')
@endsection

@section('contents')
<div class="layouttitle">
    <section class="header">
        <div class="title">
            <h1>Create New Iphone</h1>
            <span>IShopApple Admin Panel</span>
        </div>
    </section>
    <section class="body">
        <h2>Profile Information</h1>
            <p>Add information name , color , ram , capacity of your product.</p>
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="first_name">Name</label><br>
                    <input type="text" name="name" id="name" required>
                </div>
                
                <div>
                    <label for="id_category">Category</label><br>
                    <select name="id_category" id="">
                        @foreach($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                <label for="id_color">Color</label><br>
                    <select name="id_color" id="">
                        @foreach($color as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                <label for="id_ram">Ram</label><br>
                    <select name="id_ram" id="">
                        @foreach($ram as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                <label for="id_capacity">Capacity</label><br>
                    <select name="id_capacity" id="">
                        @foreach($capacity as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                    <div>
                        <label for="price">Price</label><br>
                        <input type="text" name="price" id="price" required>
                    </div>
                    <div>
                        <label for="quantity">quantity</label><br>
                        <input type="text" name="quantity" id="quantity" required>
                    </div>
                
                <div>
                    <label for="description">Description</label><br>
                    <textarea name="description" id="" cols="50" rows="10"></textarea>
                </div>
                <div>
                    <label for="images">Image</label><br>
                    <input type="file" name="images[]" multiple id="images" required>
                </div>
                <button id="sign_up">Add</button>
            </form>
    </section>

</div>
@endsection

@section('myjs')

@end