@extends('admin/layout/layout')
@section('mycss')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/editprofile.css')}}">
@endsection
@section('contents')


<div class="editprofile">
    <h1 class="title">Profile</h1>
    <section class="profile">
        <h2>Profile Information</h1>
            <p>Update your account's profile information and email address.</p>
            <form action="">
                <div>
                    <label for="name">Name</label><br>
                    <input type="text" name="name">
                </div>

                <div>
                    <label for="email">Email</label><br>
                    <input type="email" name="email">
                </div>

                <button type="submit" class="information">Save</button>
            </form>
    </section>


    <section class="update">
        <h2>Update Password</h2>
        <p>Ensure your account is using a long, random password to stay secure.</p>
        <form action="">
            <div>
                <label for="curentpassword">Current Password</label><br>
                <input type="password" name="curentpassword">
            </div>

            <div>
                <label for="newpassword">New Password</label><br>
                <input type="password" name="newpassword">
            </div>

            <div>
                <label for="confirmpassword">Confirm Password</label><br>
                <input type="password" name="confirmpassword">
            </div>

            <button type="submit" class="updatepassword">Save</button>
        </form>
    </section>
    <section class="delete">
        <h2>Delete Account</h2>
        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your account, please download any data or information that you wish to retain.</p>
        <form action="">
            <button type="submit" class="deleteaccount">Delete Account</button>
        </form>
    </section>
</div>
@endsection