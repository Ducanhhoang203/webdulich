@include('clients.blocks.header');

<!-- Khu vực điểm đến phổ biến bắt đầu -->
<section class="popular-destinations-area pt-100 pb-90 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center counter-text-wrap mb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Khám phá các điểm đến phổ biến</h2>
                    <p>Một trang <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> trải nghiệm phổ biến nhất</p>
                    <ul class="destinations-nav mt-30">
                        <li data-filter="*" class="active">Tất cả</li>
                        <li data-filter=".features">Nổi bật</li>
                        <li data-filter=".recent">Gần đây</li>
                        <li data-filter=".city">Thành phố</li>
                        <li data-filter=".rating">Đánh giá</li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="container">
            <div class="row gap-10 destinations-active justify-content-center">
                <div class="col-xl-3 col-md-6 item recent rating">
                    <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="assets/images/destinations/destination1.jpg" alt="Destination">
                        </div>
                        <div class="content">
                            <h6><a href="destination-details.html">Bãi biển Thái Lan</a></h6>
                            <span class="time">5352+ tour & 856+ hoạt động</span>
                            <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 item features">
                    <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="assets/images/destinations/destination2.jpg" alt="Destination">
                        </div>
                        <div class="content">
                            <h6><a href="destination-details.html">Parga, Hy Lạp</a></h6>
                            <span class="time">5352+ tour & 856+ hoạt động</span>
                            <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 item recent city rating">
                    <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="assets/images/destinations/destination3.jpg" alt="Destination">
                        </div>
                        <div class="content">
                            <h6><a href="destination-details.html">Castellammare del Golfo, Ý</a></h6>
                            <span class="time">5352+ tour & 856+ hoạt động</span>
                            <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 item city features">
                    <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="assets/images/destinations/destination4.jpg" alt="Destination">
                        </div>
                        <div class="content">
                            <h6><a href="destination-details.html">Khu bảo tồn Canada, Canada</a></h6>
                            <span class="time">5352+ tour & 856+ hoạt động</span>
                            <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 item recent">
                    <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="assets/images/destinations/destination5.jpg" alt="Destination">
                        </div>
                        <div class="content">
                            <h6><a href="destination-details.html">Dubai, Hoa Kỳ</a></h6>
                            <span class="time">5352+ tour & 856+ hoạt động</span>
                            <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 item features rating">
                    <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="assets/images/destinations/destination6.jpg" alt="Destination">
                        </div>
                        <div class="content">
                            <h6><a href="destination-details.html">Milos, Hy Lạp</a></h6>
                            <span class="time">5352+ tour & 856+ hoạt động</span>
                            <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Khu vực điểm đến phổ biến kết thúc -->

@include('clients.blocks.footer');
