@include('clients.blocks.header')

<style>
    .alight {
        margin-left: 30%;
    }
    .alight p {
        text-align: center;
    }
    .alight-top {
        margin-top: 20px;
    }
</style>

<!-- About Area Start -->
<section class="about-area-two py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                <span class="subtitle mb-35">About</span>
            </div>
            <div class="col-xl-9">
                <div class="about-page-content" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="row">
                        <div class="col-lg-8 pe-lg-5 me-lg-5">
                            <div class="section-title mb-25">
                                <h2>The End Result of All True Learning</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="experience-years rmb-20">
                                <span class="title bgc-secondary">Học sinh</span>
                                <span class="text">Chúng tôi</span>
                                <span class="years">100+</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <ul class="list-style-two mt-35">
                             
                                <li>Hỗ trợ 24/7</li>
                                <li>Các Khóa học chất lượng cao</li>
                            </ul>
                            <a href="{{ URL::to('/contact/#nhay') }}" class="theme-btn style-three mt-30">
                                <span data-hover="Đăng ký ngay">Đăng ký ngay</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Area End -->

<!-- Team Area Start -->
<section class="about-team-area pb-70 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Danh sách giáo viên</h2>
                </div>
            </div>
        </div>
          
        <div class="row justify-content-center">
          @foreach ($instructors as $gv)
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="team-item hover-content" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <img src="{{ asset('uploads/instructors/'.$gv->instructors_image) }}" alt="giangvien">
                    <div class="content">
                        <h6>{{ $gv->instructors_name }}</h6>
                        <span class="designation">{{ $gv->instructors_bio }}</span>
                        <div class="social-style-one inner-content">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach
        </div>
      
    </div>
</section>
<!-- Team Area End -->

<!-- Features Area Start -->
<section class="about-feature-two bgc-black pt-100 pb-45 rel z-1">
    <div class="container">
        <div class="section-title text-center text-white counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
 
            <p>Các khóa học mới nhất </p>
        </div>
        <div class="row">
        
           @foreach ($product as $key=>$pro)
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up"  data-aos-duration="1500" data-aos-offset="50">
                <div class="feature-item style-two">
                    <div class="icon"><i class="flaticon-booking"></i></div>
                    <div class="content">
                        <h5><a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}">{{ $pro->product_name }}</a></h5>
                        <p>
                            {{ $pro->product_desc }}
                        </p>
                    </div>
                </div>
            </div>
           @endforeach
        
        </div>
    </div>
    <div class="shape">
        <img src="assets/images/video/shape1.png" alt="shape">
    </div>
</section>
<!-- Features Area End -->

<!-- Video Area Start -->
<div class="video-area pt-25 rel z-1">
    <div class="container">
        <div class="video-wrap" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
            <img src="assets/images/video/video-bg.jpg" alt="Video">
            <a href="https://www.youtube.com/watch?v=n-etlfVH8NE" class="mfp-iframe video-play" tabindex="-1">
                <i class="fas fa-play"></i>
            </a>
        </div>
    </div>
    <div class="for-bg bgc-black">
        <div class="shape">
            <img src="assets/images/video/shape2.png" alt="shape">
        </div>
    </div>
</div>
<!-- Video Area End -->

<!-- Client Logo Area Start -->
<div class="client-logo-area mb-100">
    <div class="container alight-top">
        <div class="client-logo-wrap pt-60 pb-55">
            <div class="text-center mb-40" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                <h6>We’re recommended by:</h6>
            </div>
            
            </div>
        </div>
    </div>
</div>
<!-- Client Logo Area End -->

@include('clients.blocks.footer')
