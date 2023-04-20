@extends('admin/layout/layout')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/layouttitle.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/addiphone.css')}}">

@section('mycss')
@endsection

@section('contents')
<div class="layouttitle">
    <section class="header">
        <div class="title">
            <h1>Create New Category</h1>
            <span>IShopApple Admin Panel</span>
        </div>
    </section>
    <section class="body">
        <h2>Profile Information</h1>
            <p>Add information name , image of your category.</p>
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="first_name">Name</label><br>
                    <input type="text" name="name" id="name" required>
                </div>
        
                <div>
                    <label for="photo">Image</label><br>
                    <input type="file" name="photo"  id="photo" required>
                </div>
                <button type="submit">Add</buttont>
            </form>
    </section>

</div>
@endsection

@section('myjs')

@end