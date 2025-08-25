<!DOCTYPE html>
<html lang="zxx">


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>DevproVN-{{ $title }}</title>
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
<body>
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
                            <a href="{{ URL::to('/contact/#nhay') }}" class="theme-btn style-two bgc-secondary">
                                <span data-hover="Đăng ký ngay ">đăng ký ngay </span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                            <!-- menu sidbar -->
                          
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>
           <!-- Hero Area Start -->
        <section class="hero-area bgc-black pt-200 rpt-120 rel z-2">
            <div class="container-fluid">
                <p class="hero-title" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
    {{ $banner->tile_baner ?? 'Devpro' }}
                </p>
 <div class="main-hero-image bgs-cover" 
     style="background-image: url({{ $banner ? URL::to($banner->image) : asset('assets/images/default-banner.jpg') }});">
</div>

               
            </div>
            
        </section>
        <!-- Hero Area End -->
