<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/mycode/frontend/layout.css')}}">

    @yield('mycss')
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="sidebar_header">
            <div class="left_sidebar_header">
                <h1><b>IShopApple </b>Store</h1>
                <a href="{{route('home')}}">Home</a>
                <a href="{{route('shop')}}">Shop</a>
                <a href="{{route('blog')}}">Blog</a>
                <a href="{{route('about')}}">About</a>
                <a href="{{route('contact')}}">Contact</a>
            </div>
            <div class="right-sidebar-header">
                <input type="text">
                <a href="{{route('cart')}}">cart</a>
                <a href="{{route('sign_in')}}">sign in</a>
                <a href="{{route('sign_up')}}">signup</a>
                <a href="{{route('signout_user')}}">sign-out</a>
            </div>
        </nav>
    </header>
    <main>
        @yield('contents')
    </main>
    <footer>
        <h1>footer</h1>
    </footer>
</body>

@yield('myjs')

</html>