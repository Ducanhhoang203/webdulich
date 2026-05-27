      @include('clients.blocks.header')
        
        
        <!-- Tour List Area start -->
        <section class="tour-list-page py-100 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-10 rmb-75">
                        <div class="shop-sidebar mb-30">
                         
                            
<div class="widget widget-activity" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
    <h6 class="widget-title">Địa điểm Muốn đến</h6>

    <form action="{{ route('tourlist') }}" method="GET" id="filterForm">
        <ul class="radio-filter">
            @foreach ($category as $key => $cat)
                <li>
                    <input class="form-check-input"
                           type="radio"
                           name="category"
                           value="{{ $cat->catgory_id }}"
                           id="activity{{ $key }}"
                           onchange="document.getElementById('filterForm').submit()"
                           {{ request('category') == $cat->catgory_id ? 'checked' : '' }}>
                    <label for="activity{{ $key }}">{{ $cat->catgory_name }}</label>
                </li>
            @endforeach
        </ul>
    </form>
</div>


                            
                           
                            
                          
                            
                            
                            <div class="widget widget-tour" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h6 class="widget-title">Popular Tours</h6>
                                <div class="destination-item tour-grid style-three bgc-lighter">
                                    <div class="image">
                                        <span class="badge">10% Off</span>
                                        <img src="assets/images/widgets/tour1.jpg" alt="Tour">
                                    </div>
                                    <div class="content">
                                        <div class="destination-header">
                                            <span class="location"><i class="fal fa-map-marker-alt"></i> Bali, Indonesia</span>
                                            <div class="ratting">
                                                <i class="fas fa-star"></i>
                                                <span>(4.8)</span>
                                            </div>
                                        </div>
                                        <h6><a href="tour-details.html">Relinking Beach, Bali, Indonesia</a></h6>
                                    </div>
                                </div>
                                <div class="destination-item tour-grid style-three bgc-lighter">
                                    <div class="image">
                                        <img src="assets/images/widgets/tour1.jpg" alt="Tour">
                                    </div>
                                    <div class="content">
                                        <div class="destination-header">
                                            <span class="location"><i class="fal fa-map-marker-alt"></i> Bali, Indonesia</span>
                                            <div class="ratting">
                                                <i class="fas fa-star"></i>
                                                <span>(4.8)</span>
                                            </div>
                                        </div>
                                        <h6><a href="tour-details.html">Relinking Beach, Bali, Indonesia</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="widget widget-cta" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="content text-white">
                                <span class="h6">Explore The World</span>
                                <h3>Best Tourist Place</h3>
                                <a href="tour-grid.html" class="theme-btn style-two bgc-secondary">
                                    <span data-hover="Explore Now">Explore Now</span>
                                    <i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="image">
                                <img src="assets/images/widgets/cta-widget.png" alt="CTA">
                            </div>
                            <div class="cta-shape"><img src="assets/images/widgets/cta-shape2.png" alt="Shape"></div>
                        </div>

                    </div>
                    <div class="col-lg-9">
                      
    <!-- Sort Form -->
    <div class=" rel z-3 mb-20">
        <form method="GET" action="{{ route('tourlist') }}" class="mb-15">
            <!-- Giữ filter hiện tại -->
            <input type="hidden" name="category" value="{{ request('category') }}">
            <input type="hidden" name="min_price" value="{{ request('min_price') }}">
            <input type="hidden" name="max_price" value="{{ request('max_price') }}">

          <select name="sort" onchange="this.form.submit()" class="form-select" style="min-width: 180px;">
    <option value="">Lựa chọn giá</option>
    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Giá từ thấp đến cao</option>
    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Giá từ cao đến thấp</option>
</select>

        </form>

        <!-- Tổng số tour -->
        <div class="sort-text mb-15 me-4 me-xl-auto"style="margin-left: 30px;">
           Số lượng tour : {{ $product_new->total() }} 
        </div>
    </div>
                        @foreach ($product_new as $key => $pro)
                        <div class="destination-item style-three bgc-lighter" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <span class="badge bgc-pink">{{ $pro->brand_name }}</span>
                               
                                <img src="{{ URL::to('uploads/product/'.$pro->product_image) }}" alt="Tour List">
                            </div>
                            <div class="content">
                                <div class="destination-header">
                                    <span class="location"><i class="fal fa-map-marker-alt"></i>{{ $pro->catgory_name }}</span>
                                    <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <h5><a href="{{ URL::To('/Chi-tiet-tour/'.$pro->product_id) }}">{{ $pro->product_name }}</a></h5>
                                <p>{{ $pro->product_desc }}</p>
                                <ul class="blog-meta">
                                    <li><i class="far fa-clock"></i> 3 ngày 2 đêm</li>
                                    <li><i class="far fa-user"></i> 5-8 guest</li>
                                </ul>
                                <div class="destination-footer">
                                    <span class="price"><span>{{ $pro->product_price }}</span>/Người</span>
                                    <a href="{{ URL::To('/Chi-tiet-tour/'.$pro->product_id) }}" class="theme-btn style-two style-three">
                                        <span data-hover="Đặt Ngay">Đặt Ngay</span>
                                        <i class="fal fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                            
                        @endforeach
                     
                     
                   
                     
                    
                       
                        <ul class="pagination pt-15 flex-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                         {{ $product_new->withQueryString()->links('pagination::bootstrap-5') }}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Tour List Area end -->
        

      
        <!-- Newsletter Area end -->
            
      @include('clients.blocks.footer')