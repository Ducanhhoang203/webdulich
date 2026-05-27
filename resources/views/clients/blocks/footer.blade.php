   <!-- footer area start -->
   <footer class="main-footer footer-two bgp-bottom bgc-black rel z-15 pt-100 pb-115" style="background-image: url(assets/images/backgrounds/footer-two.png);">
     
    <div class="widget-area">
        <div class="container">
            <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2">
                <div class="col col-small" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-text">
                        <div class="footer-logo mb-40">
                            <a href="{{URl::to('/') }}"><img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo"></a>
                        </div>
                        <div class="footer-map">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1861.9071199927234!2d105.77360986502515!3d21.04011746784928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454c90a66a4fd%3A0x1c9a2fe43fae27dd!2zMTQ3IFAuIE1haSBE4buLY2gsIE1haSBE4buLY2gsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1755852567906!5m2!1svi!2s" width="250" 
                          height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                  
                    <div class="footer-widget footer-links ms-sm-5">
                        <div class="footer-title">
                            <h5> Tours Mớii</h5>
                        </div>
                       <ul class="list-style-three">
                            @foreach ($product_ft as $key =>$pro)
                                <li><a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}">{{ $pro->product_name }}</a></li>
                           @endforeach
                           
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links ms-md-4">
                        <div class="footer-title">
                            <h5>Bài viết</h5>
                        </div>
                          <ul class="list-style-three">
                           @foreach ($posts_ft as $key =>$pt)
                         <li><a href="{{ URL::to('/chitietbaiviet/'.$pt->id) }}">{{ $pt->Baiviet_title }}</a></li>
                         @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links ms-lg-4">
                        <div class="footer-title">
                            <h5>Event & FAQ</h5>
                        </div>
                           <ul class="list-style-three">
                               <li><a href="{{URl::to('/event')  }}">Tất cả event</a></li>
                            <li><a href="{{URl::to('/faq')  }}">Tất cả Faq</a></li>
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
                            <li><i class="fal fa-envelope"></i> hducanh68@gmail.com</li>

                            <li><i class="fal fa-phone-volume"></i>  0985.95.08.95</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</footer>
<!-- footer area end -->

</div>
<!--End pagewrapper-->


<!-- Jquery -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Appear Js -->
<script src="{{ asset('assets/js/appear.min.js') }}"></script>
<!-- Slick -->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Nice Select -->
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<!-- Image Loader -->
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- Jquery UI -->
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!-- Isotope -->
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<!--  AOS Animation -->
<script src="{{ asset('assets/js/aos.js') }}"></script>
<!-- Bootstrap Bundle (bao gồm Popper.js) -->


<!-- Custom script -->
<script src="{{ asset('assets/js/script.js') }}"></script>
  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
 <div class="zalo-chat-widget" 
       data-oaid="1906943302261076404" 
       data-welcome-message="Xin chào! DevproVN có thể giúp gì cho bạn?"
       data-autopopup="0"
       data-width="350"
       data-height="420">
  </div>
</body>

<!-- Mirrored from webtendtheme.net/html/2024/ravelo/tour-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 09:28:05 GMT -->
</html>