
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('/admin/production/images/favicon.ico') }}" type="image/ico" />


    <title>Quản trị viên</title>

    <!-- Bootstrap -->
 
    <!-- Bootstrap -->
<!-- Bootstrap -->
<link href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- NProgress -->
<link href="{{ asset('admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
<!-- iCheck -->
<link href="{{ asset('admin/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{{ asset('admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
<!-- JQVMap -->
<link href="{{ asset('admin/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="{{ asset('admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{ asset('admin/build/css/custom.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/build/css/custom.css') }}" rel="stylesheet">
    <!-- Font Awesome -->

  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-dashboard"></i> <span>Trang quản trị</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
        
              <div class="profile_info">
            @yield('admin_content')
              </div>
         
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              
                <ul class="nav side-menu">
                   <li><a><i class="fa fa-edit"></i>Phân Quyền<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
               
                      <li><a href="{{ URL::to('/all_admin') }}">Danh Sách</a></li>
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-edit"></i>Thông kê và Booking <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                 
                      <li><a href="{{URL::to('/admin/bookings') }}">Danh Sách </a></li>
 
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Danh mục địa điểm đến  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-cartegory-product') }}">Thêm danh mục</a></li>
                      <li><a href="{{ URL::to('/all-cartegory-product') }}">liệt kê danh mục</a></li>
            
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Loại Hình Tour<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-brand-product') }}">Thêm </a></li>
                      <li><a href="{{URL::to('/all-brand-product') }}">Danh sách  </a></li>
                    
                    </ul>
                  </li>
                  
                       <li><a><i class="fa fa-edit"></i>Quản banner<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URl::to('/add-banner') }}">Thêm </a></li>
                      <li><a href="{{ URl::to('/all-banner')}}">Danh Sách</a></li>
                    </ul>
                  </li>
                    <li><a><i class="fa fa-edit"></i>Quản lý logo<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-footer') }}">thêm </a></li>
                      <li><a href="{{ URL::to('/all-footer') }}">Hiển thị </a></li>
                    </ul>
                  </li> 

                   <li><a><i class="fa fa-edit"></i>Thêm tour <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-product') }}">Thêm </a></li>
                      <li><a href="{{URL::to('/all-product') }}">Danh Sách </a></li>
 
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Quản lý giảm giá<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('discount.create') }}">Thêm </a></li>
                      <li><a href="{{ route('discount.index')}}">Danh Sách </a></li>
 
                    </ul>
                  </li>
                   

                 
                  <li><a><i class="fa fa-edit"></i>Thông tin của Tour<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-chitietkhoahoc') }}">Thêm </a></li>
                      <li><a href="{{ URL::to('/all-chitietkhoahoc') }}">Danh sách </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Hướng Dẫn viên<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-instructors') }}">Thêm </a></li>
                      <li><a href="{{ URL::to('/all-instructors') }}">Danh sách </a></li>
                    </ul>
                  </li>
                 
                
                  <li><a><i class="fa fa-edit"></i>Quản lý bài viết<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-baiviet') }}">Thêm  </a></li>
                      <li><a href="{{ URL::to('/all-baiviet') }}">Danh sách</a></li>
                    </ul>
                  </li> 
                   <li><a><i class="fa fa-edit"></i>Câu hỏi thường gặp<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-faqct') }}">Thêm  </a></li>
                      <li><a href="{{ URL::to('/all-faqct') }}">Danh sách </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Quản lý event<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-event') }}">thêm event </a></li>
                      <li><a href="{{ URL::to('/all-event') }}"> Danh sách event</a></li>
                    </ul>
                  </li>  
                  <li><a><i class="fa fa-edit"></i>Quản lý about secition<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('/add-section') }}">thêm secition  </a></li>
                      <li><a href="{{ URL::to('/about_sections') }}"> Danh sách secition</a></li>
                    </ul>
                  </li> 
                  
                 
                     <li><a><i class="fa fa-edit"></i>Quản lý menu<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('menus.create') }}">Thêm </a></li>
                      <li><a href="{{ route('menus.index') }}">Danh Sách</a></li>
                    </ul>
                  </li> 
                  
                    
                  
                   
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{URl::to('/quanly') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    
                    <?php 
                    $name = Session::get('admin_name');
                    if($name){
                      echo $name;
                    }
                    ?>
                  </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="javascript:;"> Hồ sơ cá nhân</a>
                
                <a class="dropdown-item" href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Cài đặt</span>
                </a>
                
                <a class="dropdown-item" href="javascript:;">Trợ giúp</a>
                
                <a class="dropdown-item" href="{{ route('logout') }}">
                  <i class="fa fa-sign-out pull-right"></i> Đăng xuất
                </a>
              </div>

                </li>

               
              </ul>
            </nav>
          </div>
        </div>
        
       
        </div>
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    </div>
<script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/vendors/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('admin/vendors/nprogress/nprogress.js') }}"></script>
<script src="{{ asset('admin/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<script src="{{ asset('admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('admin/vendors/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('admin/vendors/skycons/skycons.js') }}"></script>
<script src="{{ asset('admin/vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('admin/vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('admin/vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('admin/vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('admin/vendors/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('admin/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('admin/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<script src="{{ asset('admin/vendors/DateJS/build/date.js') }}"></script>
<script src="{{ asset('admin/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<script src="{{ asset('admin/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin/build/js/custom.min.js') }}"></script>

  </body>
</html>
