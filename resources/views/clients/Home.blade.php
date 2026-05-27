@include('clients.blocks.headerhome')
<style>
 .destination-item .content h5 a {
    display: -webkit-box;        /* tạo một khối để clamp */
    -webkit-line-clamp: 2;       /* giới hạn 2 dòng */
    -webkit-box-orient: vertical; /* hướng dòng là dọc */
    overflow: hidden;             /* ẩn phần text vượt quá */
    text-overflow: ellipsis;      /* dấu 3 chấm */
}
.excerpt-2lines {
  display: -webkit-box;
  -webkit-line-clamp: 2;      /* Giới hạn 2 dòng */
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  line-height: 1.6em;
  max-height: 3.2em;          /* 1.6em x 2 dòng */
  color: #333;
  text-decoration: none;
}
.heart-icon {
  font-size: 24px;
  color: #ccc;
  cursor: pointer;
  transition: color 0.3s;
}
.heart-icon.active {
  color: red;
}





</style>
<section class="hero-area bgc-black pt-200 rpt-120 rel z-2">
    <div class="container-fluid">
        <h1 class="hero-title" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
           Du lịch & Lữ hành
        </h1>
        <div class="main-hero-image bgs-cover" style="background-image: url('{{ asset($banner->image) }}');"></div>
    </div>

    <div class="container container-1400">
        <form action="{{ route('search.product') }}" method="GET" class="search-filter-inner" data-aos="zoom-out-down" data-aos-duration="1500" data-aos-offset="50">
            
            <!-- Tên sản phẩm -->
            <div class="filter-item clearfix">
                <div class="icon"><i class="fal fa-map-marker-alt"></i></div>
                <span class="title">Tên Tour </span>
                <input type="text" name="product_name" placeholder="Nhập nơi đến...">
            </div>

            <!-- Giá -->
            <div class="filter-item clearfix">
                <div class="icon"><i class="fal fa-money-bill"></i></div>
                <span class="title">Giá</span>
                <input type="number" name="product_price" placeholder="Giá tối đa...">
            </div>

            <!-- Danh mục -->
            <div class="filter-item clearfix">
                <div class="icon"><i class="fal fa-flag"></i></div>
                <span class="title">Danh Mục Điểm Đến</span>
                <select name="category_id">
                    <option value="">Tất cả</option>
                    @foreach($category as $category)
                        <option value="{{ $category->catgory_id }}">{{ $category->catgory_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Trạng thái -->
           

            <div class="search-button">
                <button type="submit" class="theme-btn">
                    <span data-hover="Tìm kiếm">Tìm kiếm</span>
                    <i class="far fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</section>

          <div class="form-back-drop"></div>

        <!-- Destinations Area start -->
        <section class="destinations-area bgc-black pt-100 pb-70 rel z-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-white text-center counter-text-wrap mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2 style="color :aliceblue;">Khám phá kho báu của thế giới cùng Ravelo</h2>
                            <p>Khám phá hơn <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> trải nghiệm đáng nhớ nhất trên một nền tảng duy nhất</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                  @foreach ($product as $key =>$pro)
                        <div class="col-xxl-3 col-xl-4 col-md-6">
                        <div class="destination-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                
                                <a href="#" class="heart" data-id="{{ $pro->product_id }}"><i class="fas fa-heart heart-icon"></i></a>
                                <img src="{{ asset('/uploads/product/'.$pro->product_image) }}" alt="Destination">
                            </div>
                            <div class="content">
                                <span class="location"><i class="fal fa-map-marker-alt"></i> {{ $pro->brand_name }}</span>
                                <h5><a href="{{ URL::To('/Chi-tiet-tour/'.$pro->product_id) }}">{{ $pro->product_name }}</a></h5>
                               
                            </div>
                            <div class="destination-footer">
                            <span class="price">
                                <span>{{ number_format($pro->product_price, 0, ',', '.') }} VND</span>
                            </span>

                                <a href="{{ URL::To('/Chi-tiet-tour/'.$pro->product_id) }}" class="read-more">Đặt ngay<i class="fal fa-angle-right"></i></a>
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
                                <h3>{{ $about1->title }}</h3>
                            </div>
                            <p>{{ $about1->description }}</p>
                            <div class="divider counter-text-wrap mt-45 mb-55"><span>We have <span><span class="count-text plus" data-speed="3000" data-stop="{{ $about1->	experience_years }}">0</span> Years</span> of experience</span></div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="counter-item counter-text-wrap">
                                        <span class="count-text k-plus" data-speed="3000" data-stop="{{$about1->popular_destinations}}">0</span>
                                        <span class="counter-title">Số người Đặt Tour</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-item counter-text-wrap">
                                        <span class="count-text m-plus" data-speed="3000" data-stop="{{ $about1->satisfied_clients }}">0</span>
                                        <span class="counter-title">Số người quan tâm</span>
                                    </div>
                                </div>
                            </div>
                            <a href="destination1.html" class="theme-btn mt-10 style-two">
                                <span data-hover="Explore Destinations">Bấm để xem các tour</span>
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
                        <h2>Khám phá những điểm đến nổi tiếng</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                   @foreach ($product_new2 as $key =>$pro)
                        <div class="col-xl-3 col-md-6">
                        <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                <img src="{{asset('uploads/product/'.$pro->product_image) }}" alt="Điểm đến">
                            </div>
                            <div class="content">
                                <h6><a href="{{ URL::to('/Chi-tiet-tour/'.$pro->product_id) }}">{{ $pro->product_name }}</a></h6>
                                <span class="time">Hơn 856+ hoạt động</span>
                                <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                   @endforeach
                  
                 
                  
                   
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Popular Destinations Area end -->
        
        
      <!-- Khu vực tính năng bắt đầu -->
<section class="features-area pt-100 pb-45 rel z-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="features-content-part mb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-60">
                        <h2>Những tính năng nổi bật mang đến trải nghiệm du lịch tuyệt vời cùng Ravelo</h2>
                    </div>
                    <div class="features-customer-box">
                        <div class="image">
                            <img src="assets/images/features/features-box.jpg" alt="Tính năng">
                        </div>
                        <div class="content">
                            <div class="feature-authors mb-15">
                                <img src="assets/images/features/feature-author1.jpg" alt="Khách hàng">
                                <img src="assets/images/features/feature-author2.jpg" alt="Khách hàng">
                                <img src="assets/images/features/feature-author3.jpg" alt="Khách hàng">
                                <span>4k+</span>
                            </div>
                            <h6>Hơn 850.000 khách hàng hài lòng</h6>
                            <div class="divider style-two counter-text-wrap my-25">
                                <span><span class="count-text plus" data-speed="3000" data-stop="25">0</span> Năm</span>
                            </div>
                            <p>Chúng tôi tự hào mang đến những hành trình được thiết kế riêng cho từng khách hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                <div class="row pb-25">
                    <div class="col-md-6">
                        <div class="feature-item">
                            <div class="icon"><i class="flaticon-tent"></i></div>
                            <div class="content">
                                <h5><a href="tour-details.html">Cắm trại giữa thiên nhiên</a></h5>
                                <p>Trải nghiệm cắm trại giúp bạn hòa mình với thiên nhiên và tận hưởng không gian yên bình.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="icon"><i class="flaticon-tent"></i></div>
                            <div class="content">
                                <h5><a href="tour-details.html">Chèo thuyền kayak</a></h5>
                                <p>Một hoạt động mạo hiểm đầy thú vị dành cho những ai yêu thích khám phá và thử thách bản thân.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item mt-20">
                            <div class="icon"><i class="flaticon-tent"></i></div>
                            <div class="content">
                                <h5><a href="tour-details.html">Đạp xe leo núi</a></h5>
                                <p>Môn thể thao đầy năng lượng, giúp bạn rèn luyện sức khỏe và tận hưởng khung cảnh hùng vĩ.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="icon"><i class="flaticon-tent"></i></div>
                            <div class="content">
                                <h5><a href="tour-details.html">Câu cá & Du thuyền</a></h5>
                                <p>Tận hưởng giây phút thư giãn tuyệt vời với hoạt động câu cá và du ngoạn trên mặt nước trong xanh.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Khu vực tính năng kết thúc -->

        <!-- Features Area end -->
         
         
     <!-- Khu vực khách sạn bắt đầu -->
<section class="hotel-area bgc-black py-100 rel z-1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-white text-center counter-text-wrap mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Khám phá những khách sạn hàng đầu thế giới</h2>
                    <p>Trải nghiệm hơn <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> địa điểm lưu trú được yêu thích nhất mà bạn sẽ nhớ mãi</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        @foreach ($topProducts as $key =>$pro)
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                <div class="destination-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="image">
                        
                        <a href="#" class="heart" data-id="{{ $pro->product_id }}"><i class="fas fa-heart heart-icon"></i></a>
                        <img src="{{ asset('/uploads/product/'.$pro->product_image) }}" alt="Khách sạn">
                    </div>
                    <div class="content">
                        <span class="location"><i class="fal fa-map-marker-alt"></i> Hà Nội</span>
                        <h5><a href="{{ url('/Chi-tiet-tour/'.$pro->product_id) }}">{{ $pro->product_name }}</a></h5>
                        <ul class="list-style-one">
                            <li><i class="fal fa-bed-alt"></i> 2 phòng ngủ</li>
                            <li><i class="fal fa-hat-chef"></i> 1 nhà bếp</li>
                            <li><i class="fal fa-bath"></i> 2 phòng tắm</li>
                            <li><i class="fal fa-router"></i> Internet</li>
                        </ul>
                        <div class="destination-footer">
                            <span class="price"><span>{{ $pro->product_price }}</span>/mỗi đêm</span>
                            <a href="{{ url('/Chi-tiet-tour/'.$pro->product_id) }}" class="read-more">Đặt ngay <i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
          
           
           
        </div>
        <div class="hotel-more-btn text-center mt-40">
            <a href="/destination2" class="theme-btn style-four">
                <span data-hover="Khám phá thêm khách sạn">Khám phá thêm khách sạn</span>
                <i class="fal fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- Khu vực khách sạn kết thúc -->

       <!-- Khu vực Ứng dụng di động start -->
<section class="mobile-app-area py-100 rel z-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="mobile-app-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-30">
                        <h2>Ứng dụng của chúng tôi đã có mặt trên các cửa hàng ứng dụng – Tải ngay thật dễ dàng!</h2>
                    </div>
                    <p>Chúng tôi luôn nỗ lực hết mình để biến giấc mơ du lịch của bạn thành hiện thực. Hãy để chúng tôi lo mọi chi tiết, để bạn chỉ cần tận hưởng và tạo nên những kỷ niệm đáng nhớ. Khám phá thế giới cùng sự tự tin trọn vẹn.</p>
                    <ul class="list-style-two mt-35 mb-30">
                        <li>Công ty du lịch giàu kinh nghiệm</li>
                        <li>Đội ngũ chuyên nghiệp</li>
                        <li>Chi phí du lịch hợp lý</li>
                        <li>Hỗ trợ trực tuyến 24/7</li>
                    </ul>
                    <div class="google-play-app-store">
                        <a href="#"><img src="assets/images/mobile-app/g-play.jpg" alt="Google Play"></a>
                        <a href="#"><img src="assets/images/mobile-app/a-store.jpg" alt="App Store"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mobile-app-images">
                    <div class="bg"><img src="assets/images/mobile-app/phone-bg.png" alt="BG"></div>
                    <div class="images">
                        <img src="assets/images/mobile-app/phone2.png" alt="Phone" data-aos="fade-down-left" data-aos-duration="1500" data-aos-offset="50">
                        <img src="assets/images/mobile-app/phone.png" alt="Phone">
                        <img src="assets/images/mobile-app/phone3.png" alt="Phone" data-aos="fade-up-right" data-aos-duration="1500" data-aos-offset="50">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Khu vực Ứng dụng di động end -->


<!-- Khu vực Đánh giá khách hàng start -->
<section class="testimonials-area rel z-1">
    <div class="container">
        <div class="testimonials-wrap bgc-lighter">
            <div class="row">
                <div class="col-lg-5 rel" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <div class="testimonial-left-image rmb-55" style="background-image: url(assets/images/testimonials/testimonial-left.jpg);"></div>
                </div>
                <div class="col-lg-7">
                    <div class="testimonial-right-content" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-55">
                            <h2><span>5280</span> Khách hàng toàn cầu nói gì về dịch vụ của chúng tôi</h2>
                        </div>
                        <div class="testimonials-active">
                            <div class="testimonial-item">
                                <div class="testi-header">
                                    <div class="quote"><i class="flaticon-double-quotes"></i></div>
                                    <h4>Dịch vụ tuyệt vời</h4>
                                    <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="text">"Chuyến đi của chúng tôi thật hoàn hảo – cảm ơn công ty du lịch này! Họ chăm lo mọi chi tiết, từ chỗ ở đến những hoạt động trải nghiệm tuyệt vời."</div>
                                <div class="author">
                                    <div class="image"><img src="assets/images/testimonials/author.jpg" alt="Author"></div>
                                    <div class="content">
                                        <h5>Randall V. Vasquez</h5>
                                        <span>Nhà thiết kế đồ họa</span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="testi-header">
                                    <div class="quote"><i class="flaticon-double-quotes"></i></div>
                                    <h4>Dịch vụ tận tâm</h4>
                                    <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="text">"Tôi thật sự ấn tượng với cách họ tổ chức và chăm sóc khách hàng. Mọi thứ diễn ra suôn sẻ và vượt xa mong đợi của tôi!"</div>
                                <div class="author">
                                    <div class="image"><img src="assets/images/testimonials/author.jpg" alt="Author"></div>
                                    <div class="content">
                                        <h5>Randall V. Vasquez</h5>
                                        <span>Nhà thiết kế đồ họa</span>
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
<!-- Khu vực Đánh giá khách hàng end -->

         
        <!-- CTA Area start -->

<!-- Khu vực Kêu gọi hành động (CTA) end -->


<!-- Khu vực Blog start -->
<section class="blog-area py-70 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Đọc tin tức và blog mới nhất</h2>
                    <p>Hơn <span class="count-text plus bgc-primary" data-speed="3000" data-stop="34500">0</span> trải nghiệm đáng nhớ mà bạn không thể quên</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
          

          @foreach ($posts as $key =>$post)
            <div class="col-xl-4 col-md-6">
                <div class="blog-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="content">
                        <a href="blog.html" class="category">Du lịch</a>
                        <h5><a href="blog-details.html">{{ $post->Baiviet_title }}</a></h5>
                        <ul class="blog-meta">
                            <li><i class="far fa-calendar-alt"></i> <a href="#">25 Tháng Hai, 2024</a></li>
                            <li><i class="far fa-comments"></i> <a href="#" class="excerpt-2lines">{{ $post->Baiviet_excerpt }}</a></li>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="assets/images/blog/blog3.jpg" alt="Blog">
                    </div>
                    <a href="{{ URL::to('/chitietbaiviet/'.$post->id) }}" class="theme-btn">
                        <span data-hover="Đọc thêm">Đọc thêm</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
              
          @endforeach
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on('click', '.heart', function(e) {
    e.preventDefault();
    let product_id = $(this).data('id');
    let _this = $(this);

    $.ajax({
        url: '/yeu-thich/' + product_id,
        type: 'GET',
        success: function(res) {
            alert(res.message);
            _this.addClass('active'); // đổi màu trái tim chẳng hạn
        },
        error: function(err) {
            if (err.status === 401) {
                alert('Vui lòng đăng nhập trước khi thêm vào yêu thích!');
                window.location.href = '/dangnhap'; // chuyển hướng đến trang đăng nhập
            }
        }
    });
});
</script>
<script>
document.querySelectorAll('.heart-icon').forEach(icon => {
  icon.addEventListener('click', function() {
    this.classList.toggle('active');
  });
});
</script>


<!-- Khu vực Blog end -->

        <!-- Blog Area end -->
          
        @include('clients.blocks.footerhome');
