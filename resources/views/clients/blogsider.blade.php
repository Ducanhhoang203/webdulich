@include('clients.blocks.header')

<!-- Blog Details Area start -->
<section class="blog-detaisl-page py-100 rel z-1">
    <div class="container">
        <div class="row">
            <!-- Nội dung bài viết chính -->
            <div class="col-lg-8">
                <div class="blog-details-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <a href="{{ URL::to('/') }}" class="category">{{ $baiviet->Baiviet_title }}</a>

                    <p>{{ $baiviet->Baiviet_slug }}</p>

                    <div class="image mt-40 mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('/uploads/posts/' . $baiviet->Baiviet_image_main) }}" alt="Blog Details">
                    </div>

                    <h5>{{ $baiviet->Baiviet_author }}</h5>

                    <p>{{ $baiviet->Baiviet_excerpt }}</p>

                    <div class="row mb-10">
                        <div class="col-sm-6">
                            <div class="image mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <img src="{{ asset('/uploads/posts/' . $baiviet->Baiviet_image_extra1) }}" alt="Blog">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="image mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" data-aos-delay="50">
                                <img src="{{ asset('/uploads/posts/' . $baiviet->Baiviet_image_extra2) }}" alt="Blog">
                            </div>
                        </div>
                    </div>

                    <p>{!! $baiviet->Baiviet_content !!}</p>
                </div>

                <hr class="mb-45">

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                <div class="blog-sidebar">

                 

                    <div class="widget widget-category" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h5 class="widget-title">Thuộc danh mục</h5>
                        <ul>
                            <li>{{ $baiviet->catgory_name }}</li>
                        </ul>
                    </div>

                    <div class="widget widget-news" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h5 class="widget-title">Các lớp học mới</h5>
                        <ul>
                            @foreach ($product as $sanpham)
                                <li>
                                    <div class="image">
                                        <img src="{{ asset('uploads/product/' . $sanpham->product_image) }}" alt="News">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            <a href="{{ URL::to('/chitietkhoahoc/' . $sanpham->product_id) }}">{{ $sanpham->product_name }}</a>
                                        </h6>
                                        <span class="date">{{ $sanpham->product_desc }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Area end -->

@include('clients.blocks.footer')
