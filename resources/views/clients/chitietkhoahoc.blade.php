@include('clients.blocks.header')

<style>
    .margin-top {
        margin-top: 20px;
    }
</style>

<section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 margin-top">
    <div class="container">
        <div class="row clearfix">

            <!-- Content Column -->
            <div class="col-lg-8 md-mb-50">
                <div class="intro-info-tabs">
                    <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab" href="#prod-overview" role="tab" aria-controls="prod-overview" aria-selected="true">Tổng Quan</a>
                        </li>
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn" id="prod-curriculum-tab" data-toggle="tab" href="#prod-curriculum" role="tab" aria-controls="prod-curriculum" aria-selected="false">Chương trình giảng dạy</a>
                        </li>
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn" id="prod-instructor-tab" data-toggle="tab" href="#prod-instructor" role="tab" aria-controls="prod-instructor" aria-selected="false">Giáo Viên</a>
                        </li>
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn" id="prod-faq-tab" data-toggle="tab" href="#prod-faq" role="tab" aria-controls="prod-faq" aria-selected="false">Câu hỏi</a>
                        </li>
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn" id="prod-reviews-tab" data-toggle="tab" href="#prod-reviews" role="tab" aria-controls="prod-reviews" aria-selected="false">Đánh giá</a>
                        </li>
                    </ul>

                    <div class="tab-content tabs-content" id="myTabContent">

                        <!-- Tổng Quan -->
                        <div class="tab-pane fade show active" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                            <div class="content white-bg pt-30">
                                <div class="course-overview">
                                    <div class="inner-box">
                                        @foreach ($product as $key =>$pro)
                                            <h4>{{ $pro->product_name }}</h4>
                                            <p>{{ $pro->product_desc }}</p>
                                            <p>{{ $pro->product_content }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Curriculum -->
                        <div class="tab-pane fade" id="prod-curriculum" role="tabpanel" aria-labelledby="prod-curriculum-tab">
                            <div class="accordion" id="curriculumAccordion">
                                @foreach ($curriculums as $key => $curri)
                                <div class="card mb-3">
                                    <div class="card-header" id="heading{{ $key }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-primary font-weight-bold collapsed" 
                                                    data-toggle="collapse" 
                                                    data-target="#collapse{{ $key }}" 
                                                    aria-expanded="false" 
                                                    aria-controls="collapse{{ $key }}">
                                                <i class="fa fa-folder-open mr-2"></i> {{ $curri->curriculums_title }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#curriculumAccordion">
                                        <div class="card-body">
                                            <ul class="list-unstyled lesson-list">
                                                <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                                    <span><i class="fa fa-file-text-o text-muted mr-2"></i>{{ $curri->curriculums_content }}</span>
                                                    <span class="badge badge-secondary">35 mins</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Instructor -->
                        <div class="tab-pane fade" id="prod-instructor" role="tabpanel" aria-labelledby="prod-instructor-tab">
                            <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                <h3 class="instructor-title">Giảng Viên</h3>
                                <div class="row rs-team style1 orange-color transparent-bg clearfix">
                                    @foreach ($instructors as $key =>$struct)
                                    <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                        <div class="team-item hover-content" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                            <img src="{{ asset('uploads/instructors/' . ($struct->instructors_image ?? 'default.png')) }}" alt="{{ $struct->instructors_name }}">
                                            <div class="content">
                                                <h6>{{ $struct->instructors_name }}</h6>
                                                <span class="designation">{{ $struct->instructors_bio }}</span>
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
                        </div>

                        <!-- FAQ -->
                        <div class="tab-pane fade" id="prod-faq" role="tabpanel" aria-labelledby="prod-faq-tab">
                            <div id="accordionFaq" class="accordion-box">
                                @foreach ($faqs as $key =>$fa)
                                <div class="card accordion block">
                                    <div class="card-header" id="faqHeading{{ $key }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link acc-btn collapsed" data-toggle="collapse" data-target="#faqCollapse{{ $key }}" aria-expanded="false" aria-controls="faqCollapse{{ $key }}">
                                                {{ $fa->faqs_chitiet_title }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="faqCollapse{{ $key }}" class="collapse" aria-labelledby="faqHeading{{ $key }}" data-parent="#accordionFaq">
                                        <div class="card-body">
                                            <p><strong>Câu hỏi:</strong> {{ $fa->faqs_chitiet_cauhoi }}</p>
                                            <p><strong>Trả lời:</strong> {{ $fa->faqs_chitiet_cautraloi }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Reviews -->
                        <div class="tab-pane fade" id="prod-reviews" role="tabpanel" aria-labelledby="prod-reviews-tab">
                            @foreach ($reviews as $key =>$re)
                            <div class="content pt-30 pb-30 white-bg">
                                <div class="cource-review-box mb-30">
                                    <h4>{{ $re->review_name }}</h4>
                                    <div class="rating">
                                        <span class="total-rating">{{ $re->review_star }}</span> 
                                        <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span> &ensp; Reviews
                                    </div>
                                    <div class="text">{{ $re->reviews_content }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <!-- Video Column -->
         <div class="video-column col-lg-4">
    <div class="inner-column">
        <div class="intro-video media-icon orange-color2">
            <img src="{{ asset('uploads/instructors/' . ($instructors3->instructors_image ?? 'default.png')) }}" alt="Video Giới thiệu">
            
            <a href="https://www.youtube.com/watch?v=n-etlfVH8NE" 
               class="mfp-iframe video-play video-center" 
               tabindex="-1">
                <i class="fas fa-play"></i>
            </a>

            <h4>Video Giới thiệu</h4>
        </div>

        <div class="btn-part">
            <a href="{{ URL::to('/contact/#nhay') }}" class="btn readon2 orange-transparent">Đăng Ký</a>
        </div>
    </div>
</div>


        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@include('clients.blocks.footer')
