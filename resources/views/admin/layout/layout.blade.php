<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('/css/mycode/admin/layout_admin_page.css')}}">
    @yield('mycss')
    <title>Document</title>
</head>

<body>

    <header class="sidebar">
        <nav class="">
            <div class="header_sidebar">
                <img class="logo_user" src="{{ asset('/images/myimg/admin/background-sidebar.jpg')}}" alt="">
                <span class="name_user">{{$auth->name}}</span>
            </div>
            <i class="btn_collapser fa-solid fa-circle-arrow-left"></i>
            <i class="menu_icon_close fa-solid fa-xmark"></i>
            <ul class="sidebar-menu">
                <li><i class="fa-sharp fa-solid fa-house-user"></i>
                    <span>Dashboard</span>
                </li>
                <li class="accordion"><i class="fas fa-users-cog"></i>
                    <span>Admin</span>
                </li>
                <div class="panel">
                    <a href="">List Admin</a>
                    <a href="">Create New Admin</a>
                </div>

                <li class="accordion"><i class="fa-solid fa-user-large"></i>
                    <span>User</span>
                </li>
                <div class="panel">
                    <a href="">List User</a>
                    <a href="">Create New User</a>
                </div>

                <li class="accordion"><i class="fa fa-product-hunt"></i>
                    <span>Product</span>
                </li>
                <div class="panel">
                    <a href="">List Prouduct</a>
                    <a href="">Create New Product</a>
                </div>


                <li class="accordion"><i class="fa-sharp fa-solid fa-folder-open"></i>
                    <span>Category</span>
                </li>
                <div class="panel">
                    <a href="">Empty</a>
                    <a href="">Empty</a>
                    <a href="">Empty</a>
                </div>
                <li class="accordion"><i class="fa fa-sort"></i>

                    <span>Order</span>
                </li>
                <div class="panel">
                    <a href="">Empty</a>
                    <a href="">Empty</a>
                    <a href="">Empty</a>
                </div>
            </ul>
        </nav>
    </header>


    <main class="main">

        <div class="tab_header">
            <a class="logo_brand" href=""><img src="" alt="" width="50px" height="50px"></a>
            <i class="menu_icon_open fa-solid fa-bars"></i>
            <div class="input_search">
                <input type="text" placeholder="Search ...">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="option">
                <i class="fa-sharp fa-solid fa-language"></i>
                <i class="fa-sharp fa-solid fa-message"></i>
                <i class="fa-solid fa-bell"></i>
                <i class="setting_account fa-sharp fa-solid fa-gear"></i>
                <div class="account_setting">
                    <a href="">Edit</a>
                    <a href="">Log Out</a>
                </div>
            </div>

        </div>


        @yield('contents')



    </main>


    <footer>

    </footer>




    <script src="{{asset('/js/mycode/1aa4f49900.js')}}"></script>
    <script src="{{asset('/js/mycode/jquery-3.6.4.min.js')}}"></script>
    @yield('myjs')
    <script>
        var acc = document.getElementsByClassName("accordion");
        for (var i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                // đóng tất cả những class accordion khác
                var accordions = document.getElementsByClassName("accordion");
                for (var j = 0; j < accordions.length; j++) {
                    if (accordions[j] !== this) {
                        // accordions[j].classList.remove("active");
                        var panel = accordions[j].nextElementSibling;
                        panel.style.maxHeight = null;
                    }
                }
                // mở những thẻ a ra
                // this.classList.toggle("active");
                var panel = this.nextElementSibling;
                var panelStyle = window.getComputedStyle(panel);
                if (panelStyle.getPropertyValue('display') == 'none') {
                    panel.style.display = 'block';
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                }
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
        /////////////////////////////////////////////////////////////////collapser-sidebar
        var sidebar = document.querySelector('.sidebar');
        var header_sidebar = document.querySelector('.header_sidebar');
        var logo_user = document.querySelector('.logo_user');
        var name_user = document.querySelector('.name_user');
        var btn_collapser = document.querySelector('.btn_collapser');
        var panels = document.querySelectorAll('.panel');

        var main = document.querySelector('.main');
        var tab_header = document.querySelector('.tab_header');

        btn_collapser.addEventListener('click', function() {
            logo_user.classList.toggle('logo_user_sidebar');
            name_user.classList.toggle('name_user_sidebar');
            sidebar.classList.toggle('sidebar_sidebar');
            this.classList.toggle('btn_collapser_sidebar');
            header_sidebar.classList.toggle('header_sidebar_sidebar');
            for (var i = 0; i < panels.length; i++) {
                panels[i].classList.toggle('panel_sidebar');
                if (panels[i].style.maxHeight) {
                    panels[i].style.display = 'none';
                }
            }
            main.classList.toggle('main_sidebar');
            tab_header.classList.toggle('tab_header_sidebar');

        });

        ////////////////////////////////////////////////////////////////menu-icon
        var menu_icon_open = document.querySelector('.menu_icon_open');
        menu_icon_open.addEventListener('click', function() {
            sidebar.classList.add('sidebar_menu_icon_open');
        });
        var menu_icon_close = document.querySelector('.menu_icon_close');
        menu_icon_close.addEventListener('click', function() {
            sidebar.classList.remove('sidebar_menu_icon_open');
        });


        function toggleHeaderClass() {
            if (window.innerWidth > 720) {
                sidebar.classList.remove('sidebar_menu_icon_open');
                main.classList.remove('main_sidebar');
                tab_header.classList.remove('tab_header_sidebar');
            } else {
                for (var i = 0; i < panels.length; i++) {
                    panels[i].classList.remove('panel_sidebar');
                    if (panels[i].style.maxHeight) {
                        panels[i].style.display = 'none';
                    }
                }
                logo_user.classList.remove('logo_user_sidebar');
                name_user.classList.remove('name_user_sidebar');
                sidebar.classList.remove('sidebar_sidebar');
                btn_collapser.classList.remove('btn_collapser_sidebar');
                header_sidebar.classList.remove('header_sidebar_sidebar');
            }
        }
        window.addEventListener('resize', toggleHeaderClass);
        toggleHeaderClass();
        //////////////////////////////////////////////////////////////////////setting_account
        var setting_account = document.querySelector('.setting_account');
        var account_setting = document.querySelector('.account_setting');
        setting_account.addEventListener('click', function() {
            account_setting.classList.toggle('account_setting_setting_account');
        });



    </script>
</body>

</html>