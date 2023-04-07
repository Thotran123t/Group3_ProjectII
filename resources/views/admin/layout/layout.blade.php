<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{asset('css/mycode/admin/layout.css')}}">
    <title>Header and Footer Example</title>   
</head>

<body class="layout">
    <header>
        <nav class="sidebar">
            <div class="brand_name">IShopApple</div>
            <ul class="sidebar-menu">
                <li class="accordion"><i class="fa-sharp fa-solid fa-house-user"></i>Dashboard</li>
                <li class="accordion"><i class="fa fa-product-hunt"></i>Product</li>
                <div class="panel">
                    <a href="">List Prouduct</a>
                    <a href="">Create New Product</a>
                </div>
                <li class="accordion"><i class="fa-solid fa-user-large"></i>User</li>
                <div class="panel">
                    <a href="">List User</a>
                    <a href="">Create New User</a>
                </div>
                <li class="accordion"><i class="fas fa-user-circle"></i>Admin</li>
                <div class="panel">
                    <a href="">List Admin</a>
                    <a href="">Create New Admin</a>
                </div>
                <li class="accordion"><i class="fa-sharp fa-solid fa-folder-open"></i>Empty</li>
                <div class="panel">
                    <a href="">Empty</a>
                    <a href="">Empty</a>
                    <a href="">Empty</a>
                </div>
                <li class="accordion"><i class="fa-sharp fa-solid fa-folder-open"></i>Empty</li>
                <div class="panel">
                    <a href="">Empty</a>
                    <a href="">Empty</a>
                    <a href="">Empty</a>
                </div>
            </ul>
        </nav>
    </header>
    <main class="main">

        @yield('contents')

    </main>
    <footer>
    </footer>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>
    <script src="{{asset('/js/1aa4f49900.js')}}"></script>

</body>

</html>