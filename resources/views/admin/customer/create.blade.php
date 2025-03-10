@extends('admin/layout/layout')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/layouttitle.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/addcustomer.css')}}">

@section('mycss')
@endsection

@section('contents')
<div class="layouttitle">
    <section class="header">
        <div class="title">
            <h1>Create New Customer</h1>
            <span>IShopApple Admin Panel</span>
        </div>
    </section>
    <section class="body">
        <h2 id="check">Profile Information</h1>
            <p>Add your account's profile information and email address.</p>
            <form>
                <div>
                    <label for="first_name">First Name</label><br>
                    <input type="text" name="first_name" id="first_name" required>
                </div>
                <div>
                    <label for="last_name">Last Name</label><br>
                    <input type="text" name="last_name" id="last_name" required>
                </div>
                <div>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="phone">Phone</label><br>
                    <input type="text" name="phone" id="phone" required>
                </div>
                <div>
                    <label for="address">Address</label><br>
                    <input type="text" name="address" id="address" required>
                </div>
                <div>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" required>
                </div>
                <button id="sign_up">Save</button>
            </form>
    </section>

</div>
@endsection

@section('myjs')
<script>
    
    $(document).ready(function() {
        $('#sign_up').click(function(e) {
            e.preventDefault();
            let first_name = $('#first_name').val();
            let last_name = $('#last_name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let password = $('#password').val();
            $.ajax({
                type: 'post',
                url: "{{route('customer.store')}}",
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    phone: phone,
                    address: address,
                    password: password,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data == 'successfully') {
                        alert('successfully !');
                    } else {
                        alert('Email already exists !');
                    }

                }
            });
        });
    })
</script>
@endsection
