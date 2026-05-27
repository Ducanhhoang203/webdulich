<!DOCTYPE html>
<html lang="zxx">


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Travel-{{ $title }}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/logos/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap&subset=vietnamese" rel="stylesheet">
    <!-- Flaticon -->
    <link rel="stylesheet" href="assets/css/flaticon.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-5.14.0.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="assets/css/aos.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<style>
    .dropdown-menu {
    border-radius: 12px;
    padding: 10px;
    min-width: 220px;
}
.dropdown-item:hover {
    background-color: #f0f0f0;
}
.dropdown-header {
    font-size: 0.9rem;
}

</style>
<body>
    @if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

@if (session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"><div class="custom-loader"></div></div>

        <!-- main header -->
        <header class="main-header header-one white-menu menu-absolute">
            <!--Header-Upper-->
            <div class="header-upper py-30 rpy-0">
                <div class="container-fluid clearfix">

                    <div class="header-inner rel d-flex align-items-center">
                        <div class="logo-outer">
                            <a href="{{ URL::to('/') }}">
        @if($footer_info2 && $footer_info2->logo_path)
              <div class="logo"><img src="{{ asset($footer_info2->logo_path) }}" alt="Logo" title="Logo" ></div>
        @else
            <img src="{{ URL::to('uploads/footer/default-logo.png') }}" alt="Logo" title="Logo">
        @endif
    </a>
                        </div>

                        <div class="nav-outer mx-lg-auto ps-xxl-5 clearfix">
                            <!-- Main Menu -->
                          <nav class="main-menu navbar-expand-lg">
                            <div class="navbar-header">
                                <div class="mobile-logo">
                                    <a href="{{ URL::to('/') }}">
                                        @if($footer_info2 && $footer_info2->logo_path)
                                            <img src="{{ URL::to($footer_info2->logo_path) }}" alt="Logo" title="Logo">
                                        @else
                                            <img src="{{ URL::to('uploads/footer/default-logo.png') }}" alt="Logo" title="Logo">
                                        @endif
                                    </a>
                                </div>

                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    @foreach($menus as $menu)
                                        @php
                                            $submenus = $children->where('parent_id', $menu->id);
                                        @endphp

                                        <li class="{{ $submenus->count() ? 'dropdown' : '' }}">
                                            <a href="{{ $menu->url ?? '#' }}">{{ $menu->title }}</a>

                                            @if($submenus->count())
                                                <ul>
                                                    @foreach($submenus as $submenu)
                                                        <li><a href="{{ $submenu->url ?? '#' }}">{{ $submenu->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>

                            <!-- Main Menu End-->
                        </div>
                        <div class="menu-btns py-10">

         @guest
        <a href="/dangnhap" class="theme-btn style-two bgc-secondary">
            <span data-hover="Đăng nhập">Đăng nhập</span>
            <i class="fal fa-arrow-right"></i>
        </a>
       
    @endguest

 @auth
<style>
.user-dropdown {
    position: relative;
    display: inline-block;
}

/* Nút avatar */
.user-dropdown .btn-avatar {
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 50%;
    width: 44px;
    height: 44px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

/* Hiệu ứng hover */
.user-dropdown .btn-avatar:hover {
    background-color: #f8f9fa;
    border-color: #d0d0d0;
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

/* Ảnh đại diện */
.user-dropdown .btn-avatar img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
    display: block;
}

/* Menu rơi xuống */
.user-dropdown .dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    top: 110%;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    min-width: 220px;
    z-index: 999;
    overflow: hidden;
}

.user-dropdown .dropdown-menu.show {
    display: block;
    animation: fadeIn 0.2s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}

.user-dropdown .dropdown-item {
    display: block;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    transition: background 0.2s;
}

.user-dropdown .dropdown-item:hover {
    background: #f5f5f5;
}

.user-dropdown .dropdown-header {
    padding: 10px;
}

.user-dropdown .dropdown-divider {
    height: 1px;
    background: #eee;
    margin: 5px 0;
}
.canchinh {
 margin-left: 2%;
}
.btn{
    border-radius: 50%;
}
</style>

<div class="user-dropdown d-inline-block">
   <button class="btn btn-secondary d-flex align-items-center" type="button" id="userMenuButton">
    <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('images/default-avatar.png') }}"
         alt="Avatar"
         class="rounded-circle me-2 canchinh"
         width="35" height="35">
</button>


  <div class="dropdown-menu shadow-lg" id="userMenu">
    <div class="dropdown-header text-center">
        <strong>{{ Auth::user()->name }}</strong><br>
        <small>{{ Auth::user()->email }}</small>
    </div>
    <div class="dropdown-divider"></div>

    <!-- Hồ sơ cá nhân -->
    <a class="dropdown-item" href="{{ url('/bs5') }}">
        <i class="fas fa-user-circle me-2 text-primary"></i> Hồ sơ cá nhân
    </a>

    <!-- Yêu thích -->
    <a class="dropdown-item" href="{{ url('/yeu-thich') }}">
        <i class="fas fa-heart me-2 text-danger"></i> Yêu thích
    </a>

    <!-- Lịch sử đặt hàng -->
    <a class="dropdown-item" href="{{ url('/my-bookings') }}">
        <i class="fas fa-history me-2 text-warning"></i> Lịch sử đặt hàng
    </a>

    <div class="dropdown-divider"></div>

    <!-- Đăng xuất -->
    <a class="dropdown-item text-danger" href="{{ route('logout') }}">
        <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
    </a>
</div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("userMenuButton");
    const menu = document.getElementById("userMenu");

    toggle.addEventListener("click", function (e) {
        e.stopPropagation();
        menu.classList.toggle("show");
    });

    document.addEventListener("click", function (e) {
        if (!menu.contains(e.target) && !toggle.contains(e.target)) {
            menu.classList.remove("show");
        }
    });
});
</script>
@endauth


</div>

                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>
           <!-- Hero Area Start -->
      
   

        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="https://webtendtheme.net/html/2024/ravelo/contact.html">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn style-two">
                                <span data-hover="Submit now">Submit now</span>
                                <i class="fal fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="contact.html"><i class="fab fa-twitter"></i></a>
                    <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                    <a href="contact.html"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!-- Hero Area End -->