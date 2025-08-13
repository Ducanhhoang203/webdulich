@include('clients.blocks.header')
       

        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="https://webtendtheme.net/html/2024/ravelo/contact.html">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn style-two">
                                <span data-hover="Submit now">Submit now</span>
                                <i class="fal fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="contact.html"><i class="fab fa-twitter"></i></a>
                    <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                    <a href="contact.html"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->
       
        
        <!-- Page Banner Start -->
        

        
        
        <!-- Tour Grid Area start -->
        <section class="tour-grid-page py-100 rel z-2">
            <div class="container">
              
                <hr class="mb-50">
                <div class="row">
                @foreach ($all_product as $key =>$pro)
                   <div class="col-xl-4 col-md-6">
                        <div class="destination-item tour-grid style-three bgc-lighter" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100" data-aos-offset="50">
                            <div class="image">
                                <span class="badge bgc-primary">{{ $pro->brand_name }}</span>
                                <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}">    <img src="{{ asset('uploads/product/' . $pro->product_image)}}" alt="Tour List"></a>
                            </div>
                            <div class="content">
                                <div class="destination-header">
                                    <span class="location"><i class="fal fa-map-marker-alt"></i> hà nội </span>
                                    <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <h5><a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}"> {{ $pro->product_name }}</a></h5>
                                <p>{{$pro->product_desc }}</p>
                              
                                <div class="destination-footer">
                                    <span class="price"><span>{{ $pro->product_price }}</span>/VNĐ</span>
                                    <a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}" class="theme-btn style-two style-three">
                                        <span data-hover="đăng ký ngay ">đăng ký ngay </span>
                                        <i class="fal fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        @endforeach
                    <div class="col-lg-12">
                        {{ $all_product->links('pagination::bootstrap-4') }}
                        {{-- <ul class="pagination justify-content-center pt-15 flex-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <li class="page-item disabled">
                                <span class="page-link"><i class="far fa-chevron-left"></i></span>
                            </li>
                            <li class="page-item active">
                                <span class="page-link">
                                    1
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="far fa-chevron-right"></i></a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </section>
       
            
      @include('clients.blocks.footer');