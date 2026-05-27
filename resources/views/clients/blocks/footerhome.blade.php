<!-- ================= Footer Area Start ================= -->
<footer class="main-footer bgs-cover overlay rel z-1 pb-25">
    <div class="container">
        <!-- Footer Top -->
        <div class="footer-top pt-100 pb-30">
            <div class="row justify-content-between">

                <!-- Logo + Slogan + Social -->
                <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-text">

                        <div class="footer-logo mb-25">
                            <a href="{{ url('/') }}">
                                @if(!empty($footer_info2) && !empty($footer_info2->logo_path))
                                    <img src="{{ asset($footer_info2->logo_path) }}" alt="Logo">
                                @else
                                    <img src="{{ asset('uploads/default-logo.png') }}" alt="Logo">
                                @endif
                            </a>
                        </div>

                        <p>{{ $footer_info2->slogan_text ?? 'Slogan mặc định' }}</p>

                        <div class="social-style-one mt-15">
                            <a href="https://www.facebook.com/devpro.edu.vn?locale=vi_VN"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.youtube.com/@devprovn"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.tiktok.com/@devpro.edu.vn"><i class="fab fa-tiktok"></i></a>
                        </div>

                    </div>
                </div>

                <!-- Newsletter -->
                <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title counter-text-wrap mb-35">
                        <h5 style="color: aliceblue">Nhập email để nhận hỗ trợ nhanh nhất</h5>
                    </div>

                    <form id="newsletter-form" class="newsletter-form mb-50">
                        @csrf
                        <input id="news-email" name="email" type="email" placeholder="Nhập email" required>
                        <button type="submit" class="theme-btn bgc-secondary style-two">
                            <span data-hover="Gửi">Gửi</span>
                            <i class="fal fa-arrow-right"></i>
                        </button>
                    </form>

                    <div id="newsletter-message"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Widgets -->
    <div class="widget-area pt-95 pb-45">
        <div class="container">
            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">

                <!-- TOUR MỚI -->
                <div class="col col-small" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Tours Mới</h5>
                        </div>
                        <ul class="list-style-three">

                            @forelse ($product_ft as $pro)
                                <li>
                                    <a href="{{ url('/chitietkhoahoc/'.$pro->product_id) }}">
                                        {{ $pro->product_name }}
                                    </a>
                                </li>
                            @empty
                                <li>Chưa có tour mới</li>
                            @endforelse

                        </ul>
                    </div>
                </div>

                <!-- BÀI VIẾT -->
                <div class="col col-small" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Bài Viết</h5>
                        </div>
                        <ul class="list-style-three">

                            @forelse ($posts_ft as $pt)
                                <li>
                                    <a href="{{ url('/chitietbaiviet/'.$pt->id) }}">
                                        {{ $pt->Baiviet_title ?? 'Không có tiêu đề' }}
                                    </a>
                                </li>
                            @empty
                                <li>Chưa có bài viết</li>
                            @endforelse

                        </ul>
                    </div>
                </div>

                <!-- Event + FAQ -->
                <div class="col col-small" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Event & FAQ</h5>
                        </div>
                        <ul class="list-style-three">
                            <li><a href="{{ url('/event') }}">Tất cả Event</a></li>
                            <li><a href="{{ url('/faq') }}">Tất cả FAQ</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Hỗ trợ -->
                <div class="col col-small" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Hỗ trợ & Giới thiệu</h5>
                        </div>
                        <ul class="list-style-three">
                            <li><a href="{{ url('/contact') }}">Liên hệ</a></li>
                            <li><a href="{{ url('/') }}">Về chúng tôi</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Địa chỉ -->
                <div class="col col-md-6 col-10 col-small" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-contact">
                        <div class="footer-title">
                            <h5>Địa chỉ công ty</h5>
                        </div>
                        <ul class="list-style-one">
                            <li><i class="fal fa-map-marked-alt"></i> Tầng 3, Số 147, Phố Mai Dịch, Cầu Giấy, Hà Nội</li>
                            <li><i class="fal fa-envelope"></i> hducanh68@gmail.com</li>
                            <li><i class="fal fa-phone-volume"></i> 0985.95.08.95</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
     <meta name="csrf-token" content="{{ csrf_token() }}">


    </div>

    <!-- Bottom -->
    <div class="footer-bottom pt-20 pb-5 text-center">
        <p>© {{ date('Y') }} Travel All rights reserved.</p>
    </div>
</footer>
<!-- ================= Footer Area End ================= -->


<!-- Newsletter Ajax -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('newsletter-form');
    const emailInput = document.getElementById('news-email');
    const messageBox = document.getElementById('newsletter-message');
    const submitBtn = form.querySelector('button[type="submit"]');
    const token = document.querySelector('input[name="_token"]').value;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        submitBtn.disabled = true;
        submitBtn.innerHTML =
            '<span data-hover="Đang gửi...">Đang gửi...</span><i class="fal fa-spinner fa-spin"></i>';

        fetch("{{ route('newsletter.send') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify({ email: emailInput.value })
        })
        .then(response => response.json())
        .then(data => {
            messageBox.innerHTML = `<p style="color:green">${data.message}</p>`;
            form.reset();
        })
        .catch(() => {
            messageBox.innerHTML = `<p style="color:red">Có lỗi xảy ra!</p>`;
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span data-hover="Gửi">Gửi</span><i class="fal fa-arrow-right"></i>';
        });
    });
});

</script>

<!-- JS Files -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/appear.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/skill.bars.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>

<!-- Zalo Chat -->
<div class="zalo-chat-widget"
     data-oaid="1906943302261076404"
     data-welcome-message="Xin chào! Travel có thể giúp gì cho bạn?"
     data-autopopup="0"
     data-width="350"
     data-height="420">
</div>
