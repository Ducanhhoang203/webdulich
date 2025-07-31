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
                            <h2>Khóa Học Nổi Bật</h2>
                            <p>One site <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> most popular experience you’ll remember</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($product as $key =>$pro)
                       <div class="col-xxl-3 col-xl-4 col-md-6">
                        <div class="destination-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                                <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                <img src="{{ asset('uploads/product/' . $pro->product_image)}}" alt="Destination">
                            </div>
                             <div class="content">

                                <h5><a href="destination-details.html">{{$pro->product_name }}</a></h5>
                                <span>{{ $pro->product_content }}</span>
                            </div>
                            <div class="destination-footer">
                                <span class="price">{{ number_format($pro->product_price).' '.('VNĐ') }} </span>
                                <a href="#" class="read-more">Đăng Kí ngay  <i class="fal fa-angle-right"></i></a>
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
                                <h2>20% Offer Running - Join Today</h2>
                            </div>
                            <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of your moment, so blinded by desire those who fail in their duty through weakness. These cases are perfectly simple and easy every pleasure is to be welcomed and every pain avoided.</p>
                            <div class="divider counter-text-wrap mt-45 mb-55"><span>We have <span><span class="count-text plus" data-speed="3000" data-stop="25">0</span> Years</span> of experience</span></div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="counter-item counter-text-wrap">
                                        <span class="count-text k-plus" data-speed="3000" data-stop="3">0</span>
                                        <span class="counter-title">Popular Destination</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-item counter-text-wrap">
                                        <span class="count-text m-plus" data-speed="3000" data-stop="9">0</span>
                                        <span class="counter-title">Satisfied Clients</span>
                                    </div>
                                </div>
                            </div>
                            <a href="destination1.html" class="theme-btn mt-10 style-two">
                                <span data-hover="Explore Destinations">Đăng ký khóa học </span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="about-us-image">
                            <div class="shape"><img src="assets/images/about/shape1.png" alt="Shape"></div>
                            <div class="shape"><img src="assets/images/about/shape2.png" alt="Shape"></div>
                            <div class="shape"><img src="assets/images/about/shape3.png" alt="Shape"></div>
                            <div class="shape"><img src="assets/images/about/shape4.png" alt="Shape"></div>
                            <div class="shape"><img src="assets/images/about/shape5.png" alt="Shape"></div>
                            <div class="shape"><img src="assets/images/about/shape6.png" alt="Shape"></div>
                            <div class="shape"><img src="assets/images/about/shape7.png" alt="Shape"></div>
                            <img src="assets/images/about/about.png" alt="About">
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
                                <h2>Latest News & events</h2>
                                <p>News Update</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-md-6">
                                <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="image">
                                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                        <img src="assets/images/destinations/destination1.jpg" alt="Destination">
                                    </div>
                                    <div class="content">
                                    <h6><a href="destination-details.html">Fitness Development Strategy Buildup Laoreet</a></h6>
                                    <span class="time"> 25 Students</span>
                                    <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="image">
                                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                        <img src="assets/images/destinations/destination2.jpg" alt="Destination">
                                    </div>
                                    <div class="content">
                                        <h6><a href="destination-details.html">Artificial Intelligence Fundamental Startup Justo</a></h6>
                                        <span class="time"> 25 Students</span>
                                        <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="image">
                                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                        <img src="assets/images/destinations/destination3.jpg" alt="Destination">
                                    </div>
                                    <div class="content">
                                        <h6><a href="destination-details.html">Artificial Intelligence Fundamental Startup Justo</a></h6>
                                        <span class="time"> 25 Students</span>
                                        <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="image">
                                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                        <img src="assets/images/destinations/destination4.jpg" alt="Destination">
                                    </div>
                                    <div class="content">
                                        <h6><a href="destination-details.html">Artificial Intelligence Fundamental Startup Justo</a></h6>
                                        <span class="time"> 25 Students</span>
                                        <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="image">
                                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                        <img src="assets/images/destinations/destination5.jpg" alt="Destination">
                                    </div>
                                    <div class="content">
                                        <h6><a href="destination-details.html">Artificial Intelligence Fundamental Startup Justo</a></h6>
                                        <span class="time"> 25 Students</span>
                                        <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                    </div>>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="image">
                                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                        <img src="assets/images/destinations/destination6.jpg" alt="Destination">
                                    </div>
                                    <div class="content">
                                        <h6><a href="destination-details.html">Artificial Intelligence Fundamental Startup Justo</a></h6>
                                        <span class="time"> 25 Students</span>
                                        <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Destinations Area end -->
        
        
        <!-- Features Area start -->
       
        <!-- Features Area end -->
         
         
        <!-- Hotel Area start -->
        
         
         
        <!-- Mobile App Area start -->
        
        <!-- Mobile App Area end -->
        
        
        <!-- Testimonials Area start -->
        {{-- <section class="testimonials-area rel z-1">
            <div class="container">
                <div class="testimonials-wrap bgc-lighter">
                    <div class="row">
                        <div class="col-lg-5 rel" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="testimonial-left-image rmb-55" style="background-image: url(assets/images/testimonials/testimonial-left.jpg);"></div>
                        </div>
                        <div class="col-lg-7">
                            <div class="testimonial-right-content" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                <div class="section-title mb-55">
                                    <h2><span>5280</span>  Global Clients Say About Us Services</h2>
                                </div>
                                <div class="testimonials-active">
                                    <div class="testimonial-item">
                                        <div class="testi-header">
                                            <div class="quote"><i class="flaticon-double-quotes"></i></div>
                                            <h4>Quality Services</h4>
                                            <div class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="text">"Our trip was absolutely a perfect, thanks this travel agency! They took care of every detail, from to accommodations, and even suggested incredible experiences"</div>
                                        <div class="author">
                                            <div class="image"><img src="assets/images/testimonials/author.jpg" alt="Author"></div>
                                            <div class="content">
                                                <h5>Randall V. Vasquez</h5>
                                                <span>Graphics Designer</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-item">
                                        <div class="testi-header">
                                            <div class="quote"><i class="flaticon-double-quotes"></i></div>
                                            <h4>Quality Services</h4>
                                            <div class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="text">"Our trip was absolutely a perfect, thanks this travel agency! They took care of every detail, from to accommodations, and even suggested incredible experiences"</div>
                                        <div class="author">
                                            <div class="image"><img src="assets/images/testimonials/author.jpg" alt="Author"></div>
                                            <div class="content">
                                                <h5>Randall V. Vasquez</h5>
                                                <span>Graphics Designer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials Area end --> --}}
         
         
        <!-- CTA Area start -->
        {{-- <section class="cta-area pt-100 rel z-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-duration="1500" data-aos-offset="50">
                        <div class="cta-item" style="background-image: url(assets/images/cta/cta1.jpg);">
                            <span class="category">Tent Camping</span>
                            <h2>Explore the world best tourism</h2>
                            <a href="tour-details.html" class="theme-btn style-two bgc-secondary">
                                <span data-hover="Explore Tours">Explore Tours</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <div class="cta-item" style="background-image: url(assets/images/cta/cta2.jpg);">
                            <span class="category">Sea Beach</span>
                            <h2>World largest Sea Beach in Thailand</h2>
                            <a href="tour-details.html" class="theme-btn style-two">
                                <span data-hover="Explore Tours">Explore Tours</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="cta-item" style="background-image: url(assets/images/cta/cta3.jpg);">
                            <span class="category">Water Falls</span>
                            <h2>Largest Water falls Bali, Indonesia</h2>
                            <a href="tour-details.html" class="theme-btn style-two bgc-secondary">
                                <span data-hover="Explore Tours">Explore Tours</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Area end -->
         
          --}}
        <!-- Blog Area start -->
        <section class="blog-area py-70 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>News Update</h2>
                            <p>News Update <span class="count-text plus bgc-primary" data-speed="3000" data-stop="34500">0</span> </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="content">
                                <a href="blog.html" class="category">admin</a>
                                <h5><a href="blog-details.html">hight school program starting soo 2021 </a></h5>
                                <ul class="blog-meta">
                                    <li><i class="far fa-calendar-alt"></i> <a href="#">the acquisition of knowiedge , skills, values befs, and habits . educational methods include teach ing training storytelling </a></li>
                                    <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                                </ul>
                            </div>
                            <div class="image">
                                <img src="assets/images/blog/blog1.jpg" alt="Blog">
                            </div>
                            <a href="blog-details.html" class="theme-btn">
                                <span data-hover="Đăng ký ngay">Đăng ký ngay </span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                           <div class="content">
                                <a href="blog.html" class="category">admin</a>
                                <h5><a href="blog-details.html">hight school program starting soo 2021 </a></h5>
                                <ul class="blog-meta">
                                    <li><i class="far fa-calendar-alt"></i> <a href="#">the acquisition of knowiedge , skills, values befs, and habits . educational methods include teach ing training storytelling </a></li>
                                    <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                                </ul>
                            </div>
                            <div class="image">
                                <img src="assets/images/blog/blog2.jpg" alt="Blog">
                            </div>
                            <a href="blog-details.html" class="theme-btn">
                                <span data-hover="đăng ký ngay ">dăng ký ngay </span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                          <div class="content">
                                <a href="blog.html" class="category">admin</a>
                                <h5><a href="blog-details.html">hight school program starting soo 2021 </a></h5>
                                <ul class="blog-meta">
                                    <li><i class="far fa-calendar-alt"></i> <a href="#">the acquisition of knowiedge , skills, values befs, and habits . educational methods include teach ing training storytelling </a></li>
                                    <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                                </ul>
                            </div>
                            <div class="image">
                                <img src="assets/images/blog/blog3.jpg" alt="Blog">
                            </div>
                            <a href="blog-details.html" class="theme-btn">
                                <span data-hover="Đăng ký ngay ">đăng ký ngay </span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area end -->
          
        @include('clients.blocks.footerhome');
