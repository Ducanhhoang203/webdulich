@include('clients.blocks.header')

<section class="tour-list-page py-100 rel z-1">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-6 col-sm-10 rmb-75">
                <div class="shop-sidebar mb-30">
                    <!-- Khóa Học -->
                    <div class="widget widget-activity" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h6 class="widget-title">Loại Hình Tour</h6>
                        <ul class="categoryname">
                        @foreach ($brand_product as $bra)
                            <li>
                                <a href="{{ URL::to('/khoa-hoc/' . $bra->brand_id) }}">
                                    {{ $bra->brand_name }}
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>

                    <!-- Reviews -->
                    <div class="widget widget-reviews" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h6 class="widget-title">By Reviews</h6>
                        <ul class="radio-filter">
                            @for ($i=1; $i<=5; $i++)
                            <li>
                                <input class="form-check-input" type="radio" name="ByReviews" id="review{{ $i }}" @if($i==1) checked @endif>
                                <label for="review{{ $i }}">
                                    <span class="ratting">
                                        @for($j=1; $j<=5; $j++)
                                            <i class="fas fa-star{{ $j <= 5-$i ? '' : ' white'}}"></i>
                                        @endfor
                                    </span>
                                </label>
                            </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-lg-9">
                <div class="shop-shorter rel z-3 mb-20">
                    <ul class="grid-list mb-15 me-2">
                        <li><a href="#"><i class="fal fa-border-all"></i></a></li>
                        <li><a href="#"><i class="far fa-list"></i></a></li>
                    </ul>
                    <div class="sort-text mb-15 me-4 me-xl-auto">
                        Số Tour: {{ $brand_by_id->count() }}
                    </div>
                    <div class="sort-text mb-15 me-4">
                        Tours Mới
                    </div>
                </div>

                @foreach ($brand_by_id as $pro)
                <div class="destination-item style-three bgc-lighter" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="image">
                        <span class="badge bgc-pink">Featured</span>
                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                        <img src="{{ asset('uploads/product/' . $pro->product_image) }}" alt="{{ $pro->product_name }}">
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
                        <h5>
                            <a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}">
                                {{ $pro->product_name }}
                            </a>
                        </h5>
                        <p>{{ $pro->product_desc }}</p>
                        <div class="destination-footer">
                            <span class="price">{{ number_format($pro->product_price) }} VNĐ</span>
                            <a href="{{ URL::to('/contact/#nhay' . $pro->product_id) }}" class="theme-btn style-two style-three">
                                <span data-hover="Đăng ký">Đăng Ký</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('clients.blocks.footer')
