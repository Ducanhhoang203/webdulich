@include('clients.blocks.header');
        <section class="faq-page-area pt-70 pb-85 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="section-title text-center counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Câu Hỏi Thường Gặp Về Việc Học Tập</h2>
                            <p>Có <span class="count-text plus" data-speed="3000" data-stop="500">0</span> người đã hỏi </p>
                        </div>
                        <div class="accordion-one" id="faq-accordion">
                     @foreach ($faqct as $key=>$fa)
                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}">
                         {{ $fa->question }}
                                    </button>
                                </h5>
                                <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>{{ $fa->answer }}</p>
                                    </div>
                                </div>
                            </div>
                     @endforeach

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQs Area end -->
        
        
        <!-- Features Area start -->
    
        <!-- Features Area end -->
        
        
        <!-- Newsletter Area start -->
       
        <!-- Newsletter Area end -->
            
           
        <!-- footer area start -->
      
<!-- Mirrored from webtendtheme.net/html/2024/ravelo/faqs.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 09:28:21 GMT -->
@include('clients.blocks.footer')