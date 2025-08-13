@include('clients.blocks.headerhome')
        <!--Form Back Drop-->
     
        
        <!-- Hidden Sidebar -->
        
        <!--End Hidden Sidebar -->
       
        
        <!-- Hero Area Start -->
        <section class="hero-area bgc-black pt-200 rpt-120 rel z-2">
            <div class="container-fluid">
                <h1 class="hero-title" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">Devpro.edu.vn</h1>
                <div class="main-hero-image bgs-cover" style="background-image: url(assets/images/hero/hero.jpg);"></div>
            </div>
            
        </section>
        <!-- Hero Area End -->
        
        
        <!-- Destinations Area start -->
        <section class="destinations-area bgc-black pt-100 pb-70 rel z-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-white text-center counter-text-wrap mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                           <h3>Khóa học nổi bật</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($product as $key =>$pro)
                       <div class="col-xxl-3 col-xl-4 col-md-6">
                        <div class="destination-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1500" data-aos-offset="50" data-product-id="{{ $pro->product_id }}">
                            <div class="image">
                                  <span class="badge bgc-primary" >{{ $pro->brand_name }}</span>
                                <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                <img src="{{ asset('uploads/product/' . $pro->product_image)}}" alt="Destination">
                            </div>
                             <div class="content">

                                <h5><a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}">{{$pro->product_name }}</a></h5>
                                <span>{{ $pro->product_content }}</span>
                            </div>
                            <div class="destination-footer">
                                <span class="price">{{ number_format($pro->product_price).' '.('VNĐ') }} </span>
                                <a href="{{ URL::to('/contact') }}" class="read-more">Đăng Kí ngay  <i class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!-- Destinations Area end -->
         
         
        <!-- About Us Area start -->
        <section class="about-us-area py-100 rpb-90 rel z-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="about-us-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-25">
                                <h2>{{ $about1->title }}</h2>
                            </div>
                            <p>{{ $about1->description }}</p>
                            <div class="divider counter-text-wrap mt-45 mb-55"><span>Chúng tôi có <span><span class="count-text plus" data-speed="3000" data-stop="{{ $about1->experience_years }}">0</span> năm</span> kinh nghiệm đào tạo</span></div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="counter-item counter-text-wrap">
                                        <span class="count-text k-plus" data-speed="3000" data-stop="{{ $about1->popular_destinations }}">0</span>
                                        <span class="counter-title">Tham gia học</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-item counter-text-wrap">
                                        <span class="count-text m-plus" data-speed="3000" data-stop="{{ $about1->satisfied_clients }}">0</span>
                                        <span class="counter-title">Số người quan tâm</span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ URL::to('/contact') }}" class="theme-btn mt-10 style-two">
                                <span data-hover="Đăng Ký Ngay">Đăng ký khóa học </span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="about-us-image">
                            @foreach ($about as $abouts)
    @php
        $shapes = json_decode($abouts->shapes, true);
    @endphp

    @if(is_array($shapes))
        @foreach($shapes as $shape)
            <div class="shape">
                <img src="{{ asset(  $shape) }}" alt="Shape">
            </div>
        @endforeach
    @endif
@endforeach
                          
                            <img src="{{ URl::to('uploads/about/'.$about1->image_main) }}" alt="About">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Area end -->
         
         
        <!-- Popular Destinations Area start -->
        <section class="popular-destinations-area rel z-1">
            <div class="container-fluid">
                <div class="popular-destinations-wrap br-20 bgc-lighter pt-100 pb-70">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h2>Những sự kiện</h2>
                                <p>sự kiện mới </p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                          @foreach ($event as $key =>$eva)
                                <div class="col-xl-3 col-md-6">
                                <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="image">
                                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                        <img src="{{$eva->image }}" alt="Destination">
                                    </div>
                                    <div class="content">
                                    <h6><a href="{{ URL::to('/event') }}">{{ $eva->category }}</a></h6>
                                   
                                    <a href="{{ URL::to('/event') }}" class="more"><i class="fas fa-chevron-right"></i></a>
                                </div>
                                </div>
                            </div> 
                          @endforeach                      
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
     
        <!-- Blog Area start -->
        <section class="blog-area py-70 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Khóa học mới nhất</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                 @foreach ($new as $key =>$new_pro)
                      <div class="col-xl-4 col-md-6">
                        <div class="blog-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="content">
                                <a href="{{ URL::to('/chitietkhoahoc/'.$new_pro->product_id) }}" class="category">{{ $new_pro->product_name }}</a>
                                <h5><a href="{{ URL::to('/chitietkhoahoc/'.$new_pro->product_id) }}">{{ $new_pro->product_desc }} </a></h5>
                                <ul class="blog-meta">
                                   
                                    <li><i class="far fa-money-bill"></i>{{ $new_pro->product_price }} VNĐ</li>
                                </ul>
                            </div>
                            <div class="image">
                                <img src="assets/images/blog/blog1.jpg" alt="Blog">
                            </div>
                            <a href="{{ URL::to('/contact') }}" class="theme-btn">
                                <span data-hover="Đăng ký ngay">Đăng ký ngay </span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>  
                 @endforeach
                
                  
                </div>
            </div>
        </section>
        <!-- Blog Area end -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.heart').click(function(e) {
        e.preventDefault();
        $(this).toggleClass('liked');
        let productId = $(this).closest('.destination-item').data('product-id');
        console.log('Liked product id:', productId);
        // TODO: Gửi ajax lưu trạng thái nếu muốn
    });
});
</script>

        @include('clients.blocks.footerhome');
