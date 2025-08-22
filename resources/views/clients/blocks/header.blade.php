<!DOCTYPE html>
<html lang="zxx">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>DevproVn -{{ $title }}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logos/favicon.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


</style>
    <!-- Flaticon -->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-5.14.0.min.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
</head>
<!-- Meta Pixel Code -->

<!-- End Meta Pixel Code -->
<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"><div class="custom-loader"></div></div>

        <!-- main header -->
        <header class="main-header header-one">
            <!--Header-Upper-->
            <div class="header-upper bg-white py-30 rpy-0">
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
                        
                        <!-- Menu Button -->
                        <div class="menu-btns py-10">
                            <a href="{{URL::to('/contact/#nhay') }}" class="theme-btn style-two bgc-secondary">
                                <span data-hover="Đăng ký">Đăng ký </span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                            <!-- menu sidbar -->
                           
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>
       

        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->
       
        
        <!-- Page Banner Start -->
        <section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url('{{ asset('assets/images/banner/banner.jpg') }}');">
            <div class="container">
                <div class="banner-inner text-white">
                    <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        