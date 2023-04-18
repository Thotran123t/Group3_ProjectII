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
                <h1>IShopApple</h1>
                <a href="">Home</a>
                <a href="">Shop</a>
                <a href="">About</a>
                <a href="">Contact</a>
            </div>
            <div class="right_sidebar_header">
                <div class="header_mobie">
                    <img src="/public/images/myimg/logo-apple.png" alt="" width="30" height="40">
                    <div class="search">
                        <input type="text" placeholder="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="header_link_right">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href=""><i class="fa-solid fa-user"></i></a>
                </div>

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