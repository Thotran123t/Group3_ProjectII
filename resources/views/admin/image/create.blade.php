@extends('admin/layout/layout')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/layouttitle.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/addiphone.css')}}">

@section('mycss')
@endsection

@section('contents')
<div class="layouttitle">
    <section class="header">
        <div class="title">
            <h1>Create New Image</h1>
            <span>IShopApple Admin Panel</span>
        </div>
    </section>
    <section class="body">
        <h2>Profile Information</h1>
            <p>Add information category , color of your image.</p>
            <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              
                
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
                    <label for="images">Image</label><br>
                    <input type="file" name="images[]"  multiple id="images" required>
                </div>
                <button>Add</button>
            </form>
    </section>

</div>
@endsection

@section('myjs')

@end