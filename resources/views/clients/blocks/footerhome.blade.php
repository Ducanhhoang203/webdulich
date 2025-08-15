 <!-- footer area start -->
 <footer class="main-footer bgs-cover overlay rel z-1 pb-25">
    <div class="container">
        <div class="footer-top pt-100 pb-30">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-text">
                        <div class="footer-logo mb-25">
                            <a href="{{ URL::to('/') }}"><img src="{{ asset($footer_info2->logo_path) }}" alt="Logo"></a>
                        </div>
                        <p>{{$footer_info2->slogan_text  }}</p>
                        <div class="social-style-one mt-15">
                            <a href="https://www.facebook.com/devpro.edu.vn?locale=vi_VN"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.youtube.com/@devprovn"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.tiktok.com/@devpro.edu.vn"><i class="fab fa-pinterest"></i></a>
                          
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title counter-text-wrap mb-35">
                        <h2>Nhập mail để nhận hỗ trợ</h2>
                       
                    </div>
                    <form id="newsletter-form" class="newsletter-form mb-50">
    @csrf
    <input id="news-email" name="email" type="email" placeholder="Email Bạn: " required>
    <button type="submit" class="theme-btn bgc-secondary style-two">
        <span data-hover="Gửi">Gửi</span>
        <i class="fal fa-arrow-right"></i>
    </button>
</form>

<!-- Chỗ hiển thị thông báo -->
<div id="newsletter-message"></div>


                </div>
            </div>
        </div>
    </div>
    <div class="widget-area pt-95 pb-45">
        <div class="container">
            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                <div class="col col-small" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Khóa Học mới </h5>
                        </div>
                        <ul class="list-style-three">
                           @foreach ($product_ft as $key =>$pro)
                                <li><a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}">{{ $pro->product_name }}</a></li>
                           @endforeach
                           
                           
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Bài Viết</h5>
                        </div>
                        <ul class="list-style-three">
                    @foreach ($posts_ft as $key =>$pt)
                         <li><a href="{{ URL::to('/chitietbaiviet/'.$pt->id) }}">{{ $pt->Baiviet_title }}</a></li>
                    @endforeach
                         
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                   <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Event & FAQ</h5>
                        </div>
                        <ul class="list-style-three">
                            <li><a href="{{URl::to('/event')  }}">Tất cả event</a></li>
                            <li><a href="{{URl::to('/faq')  }}">Tất cả Faq</a></li>

                          
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                   <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Hỗ trợ & Giới thiệu</h5>
                        </div>
                        <ul class="list-style-three">
                            <li><a href="{{ URl::to('/contact') }}">Contact</a></li>
                            <li><a href="{{ URl::to('/') }}">Về chúng tôi</a></li>

                      
                        </ul>
                    </div>
                </div>
                <div class="col col-md-6 col-10 col-small" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-contact">
                        <div class="footer-title">
                            <h5>Địa chỉ công ty </h5>
                        </div>
                        <ul class="list-style-one">
                            <li><i class="fal fa-map-marked-alt"></i>  Tầng 3, Số 147, Phố Mai Dịch, Cầu giấy, Hà Nội</li>
                            <li><i class="fal fa-envelope"></i> hangmnm@gmail.com</li>

                            <li><i class="fal fa-phone-volume"></i>  0985.95.08.95</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-20 pb-5">
   
</footer>
<!-- footer area end -->

</div>
<!--End pagewrapper-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('newsletter-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Ngăn reload

        let email = document.getElementById('news-email').value;
        let token = document.querySelector('input[name="_token"]').value;

        fetch("{{ route('newsletter.send') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('newsletter-message').innerHTML =
                `<p style="color:green">${data.message}</p>`;
            document.getElementById('newsletter-form').reset();
        })
        .catch(error => {
            console.error(error);
            document.getElementById('newsletter-message').innerHTML =
                `<p style="color:red">Có lỗi xảy ra!</p>`;
        });
    });
});
</script>



<!-- Jquery -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Appear Js -->
<script src="assets/js/appear.min.js"></script>
<!-- Slick -->
<script src="assets/js/slick.min.js"></script>
<!-- Magnific Popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- Nice Select -->
<script src="assets/js/jquery.nice-select.min.js"></script>
<!-- Image Loader -->
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<!-- Skillbar -->
<script src="assets/js/skill.bars.jquery.min.js"></script>
<!-- Isotope -->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!--  AOS Animation -->
<script src="assets/js/aos.js"></script>
<!-- Custom script -->
<script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from webtendtheme.net/html/2024/ravelo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 09:27:04 GMT -->
</html>