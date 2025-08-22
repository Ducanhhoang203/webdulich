@include('clients.blocks.header')
<style>
    .margin-top{
        margin-top: 20px;
    }
    
</style>

        <!--Full width header End-->

		<!-- Main content Start -->
       
            <!-- Breadcrumbs End -->            

            <!-- Intro Courses -->
            <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 margin-top">
                <div class="container">
                    <div class="row clearfix">
                        <!-- Content Column -->
                        <div class="col-lg-8 md-mb-50">
                            <!-- Intro Info Tabs-->
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
                                        <a class="nav-link tab-btn" id="prod-faq-tab" data-toggle="tab" href="#prod-faq" role="tab" aria-controls="prod-faq" aria-selected="false">Câu hỏi </a>
                                    </li>
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn" id="prod-reviews-tab" data-toggle="tab" href="#prod-reviews" role="tab" aria-controls="prod-reviews" aria-selected="false">Đánh giá</a>
                                    </li>
                                </ul>
                                <div class="tab-content tabs-content" id="myTabContent">
                              
                                   
                           
                                       @foreach ($product as $key =>$pro)
                                            <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                                        <div class="content white-bg pt-30">
                                            <!-- Cource Overview -->
                                            <div class="course-overview">
                                                <div class="inner-box">
                                                    <h4>{{ $pro->product_name }}</h4>
                                                    <p>{{ $pro->product_desc }}</p>
                                                    <p>{{ $pro->product_content }}</p>                                                                                                    
                                                </div>
                                            </div>                                                
                                        </div>
                                    </div>
                                       @endforeach
                         
      
                                           
<div class="tab-pane fade" id="prod-curriculum" role="tabpanel" aria-labelledby="prod-curriculum-tab">
       @foreach ($curriculums as $key =>$curri)
  <div class="content py-4">
    <div class="accordion" id="curriculumAccordion">

      <!-- UI/UX Introduction -->
      <!-- Typography -->
    
          <div class="card mb-3">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link text-primary font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <i class="fa fa-folder-open mr-2" ></i>  {{$curri->curriculums_title}} 
            </button>
          </h5>
        </div>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#curriculumAccordion">
          <div class="card-body">
            <ul class="list-unstyled lesson-list">
              <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                <span><i class="fa fa-file-text-o text-muted mr-2"></i>{{$curri->curriculums_content}}</span>
                <span class="badge badge-secondary">35 mins</span>
              </li>
              
            </ul>
          </div>
        </div>
      </div>


    </div>
  </div>
      @endforeach
</div>
     

    

                 <div class="tab-pane fade" id="prod-instructor" role="tabpanel" aria-labelledby="prod-instructor-tab">
                              
                <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                         <h3 class="instructor-title">Giảng Viên</h3>
                      
                    <div class="row rs-team style1 orange-color transparent-bg clearfix">
                           @foreach ($instructors as $key =>$struct)
                    <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                               
                        <div class="team-item hover-content" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <img src="{{ asset('uploads/instructors/' . $struct->instructors_image)}}" alt="Guide">
                            <div class="content">
                                <h6>{{ $struct->instructors_name }}</h6>
                                <span class="designation">{{ $struct->instructors_bio }}</span>
                                <div class="social-style-one inner-content">
                                    <a href="contact.html"><i class="fab fa-twitter"></i></a>
                                    <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                                    <a href="contact.html"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                
         </div>                                                            
                                                     @endforeach                                                                 
                                            </div> 
                                       

                                        </div>
                                            
                                    </div>


                                       
                               

                     <div class="tab-pane fade" id="prod-faq" role="tabpanel" aria-labelledby="prod-faq-tab">
                                         @foreach ($faqs as $key =>$fa)
                                        <div class="content">
                                            <div id="accordion3" class="accordion-box">
                                                <div class="card accordion block">
                                                    <div class="card-header" id="headingSeven">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link acc-btn" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">{{$fa->faqs_chitiet_title}}</button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordion3">
                                                    <div class="accordion-one" id="faq-accordion">
                                                    <div class="content">
                                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                                    <h5 class="accordion-header">
                                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                                    {{ $fa->faqs_chitiet_cauhoi }}
                                                        </button>
                                                    </h5>
                                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                        <div class="accordion-body">
                                                            <p>{{ $fa->faqs_chitiet_cautraloi }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                       </div>
                                                      
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                            
                                            </div>                                              
                                        </div>
                                          @endforeach
                                    </div>
               
                         
                                 
                                        <div class="tab-pane fade" id="prod-reviews" role="tabpanel" aria-labelledby="prod-reviews-tab">
                                              @foreach ($reviews as $key =>$re)
                                        <div class="content pt-30 pb-30 white-bg">
                                            <div class="cource-review-box mb-30">
                                                <h4>{{$re->review_name }}</h4>
                                                <div class="rating">
                                                    <span class="total-rating">{{$re->review_star}}</span> <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>&ensp; Reviews
                                                </div>
                                                <div class="text">{{$re->reviews_content}}</div>

                                               
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
                            <!-- Video Box -->
                                <div class="intro-video media-icon orange-color2">
                           <img src="{{ asset('uploads/instructors/' . ($instructors3->instructors_image ?? 'default.png')) }}" alt="">
                                    <a class="popup-videos" href="https://www.youtube.com/watch?v=6vclc_Wi3GY">
                                        <i class="fa fa-play"></i>
                                    </a>
                                    <h4>Video Giới thiệu</h4>
                                </div>
                                <!-- End Video Box -->
                               
                                
                                <div class="btn-part">
                                   
                                    <a href="{{ URl::to('/contact/#nhay') }}" class="btn readon2 orange-transparent">Đăng Ký</a>
                                </div>
                            </div>
                        </div>                        
                    </div>                
                </div>
            </section>
            <!-- End intro Courses -->

            <!-- Newsletter section start -->
           
        <!-- Main content End --> 
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript để kích hoạt hiển thị tab Curriculum -->
<script>
  $(document).ready(function () {
    const tab = $('#prod-curriculum-tab');
    if (tab.length) {
      tab.on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
      });
    }
  });
</script>


        
    @include('clients.blocks.footer')