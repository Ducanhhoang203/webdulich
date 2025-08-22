@include('clients.blocks.header')
        
 
        <section class="tour-list-page py-100 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-10 rmb-75">
                        <div class="shop-sidebar mb-30">
                           
                            
                            <div class="widget widget-activity" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h6 class="widget-title">Khóa Học</h6>
                                @foreach ($brand_product as $key =>$bra)
                                    
                              
                                <ul class="categoryname">
                                    <li>
                                        
                                       <a href="{{ URL::to('/khoa-hoc/' . $bra->brand_id) }}">{{ $bra->brand_name }}</a>
                                    </li>
                                    
                                </ul>
                                  @endforeach
                            </div>
                            
                            <div class="widget widget-reviews" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h6 class="widget-title">By Reviews</h6>
                                <ul class="radio-filter">
                                    <li>
                                        <input class="form-check-input" type="radio" checked name="ByReviews" id="review1">
                                        <label for="review1">
                                            <span class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="form-check-input" type="radio" name="ByReviews" id="review2">
                                        <label for="review2">
                                            <span class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt white"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="form-check-input" type="radio" name="ByReviews" id="review3">
                                        <label for="review3">
                                            <span class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star white"></i>
                                                <i class="fas fa-star-half-alt white"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="form-check-input" type="radio" name="ByReviews" id="review4">
                                        <label for="review4">
                                            <span class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star white"></i>
                                                <i class="fas fa-star white"></i>
                                                <i class="fas fa-star-half-alt white"></i>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="form-check-input" type="radio" name="ByReviews" id="review5">
                                        <label for="review5">
                                            <span class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star white"></i>
                                                <i class="fas fa-star white"></i>
                                                <i class="fas fa-star white"></i>
                                                <i class="fas fa-star-half-alt white"></i>
                                            </span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            
                         
                        </div>
                        
                        

                    </div>
                    <div class="col-lg-9">
                        <div class="shop-shorter rel z-3 mb-20">
                            <ul class="grid-list mb-15 me-2">
                                <li><a href="#"><i class="fal fa-border-all"></i></a></li>
                                <li><a href="#"><i class="far fa-list"></i></a></li>
                            </ul>
                            <div class="sort-text mb-15 me-4 me-xl-auto">
                                Số lớp học :
       @foreach ($product as $pro)
    @if ($loop->last)
        {{ $loop->iteration }}
    @endif
@endforeach

                            </div>
                            <div class="sort-text mb-15 me-4">
                                Khóa Học mới
                            </div>
                            
                        </div>
                        @foreach ($brand_by_id as $key => $pro)
                            <div class="destination-item style-three bgc-lighter" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <span class="badge bgc-pink">Featured</span>
                                <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                <img src="{{ asset('uploads/product/' . $pro->product_image) }}" alt="Tour List">
                            </div>
                            <div class="content">
                                <div class="destination-header">
                                    <span class="location"><i class="fal fa-map-marker-alt"></i> Ha noi</span>
                                    <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <h5><a href="tour-details.html">{{ $pro->product_name }}</a></h5>
                                <p>{{ $pro->product_desc }}</p>
                                
                                <div class="destination-footer">
                                    <span class="price"><span>{{ number_format($pro->product_price).' '.'VNĐ' }}</span></span>
                                   <a href="{{ URL::to('/contact/#nhay' . $pro->product_id) }}"class="theme-btn style-two style-three"> 
                                        <span data-hover="Đăng ký ">Đăng Ký </span>
                                        <i class="fal fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                      
                        
                 
                     
                </div>
            </div>
        </section>
        
    @include('clients.blocks.footer')