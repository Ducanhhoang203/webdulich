@include('clients.blocks.header')

<!-- Blog Details Area start -->
<section class="blog-detaisl-page py-100 rel z-1">
    <div class="container">
        <div class="row">

            <!-- Nội dung bài viết chính -->
            <div class="col-lg-8">
                <div class="blog-details-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">

                    <!-- Tiêu đề -->
                    <h2 class="mb-3">{{ $baiviet->Baiviet_title }}</h2>

                    <!-- Slug -->
                    <p class="text-muted">{{ $baiviet->Baiviet_slug }}</p>

                    <!-- Ảnh chính -->
                    @if(!empty($baiviet->Baiviet_image_main))
                        <div class="image mt-40 mb-30">
                            <img src="{{ asset('uploads/posts/' . $baiviet->Baiviet_image_main) }}" 
                                 alt="{{ $baiviet->Baiviet_title }}" 
                                 class="img-fluid rounded">
                        </div>
                    @endif

                    <!-- Tác giả -->
                    <h6 class="mb-3">Tác giả: {{ $baiviet->Baiviet_author }}</h6>

                    <!-- Excerpt (Markdown nếu có) -->
                    @if(!empty($baiviet->Baiviet_excerpt))
                        <div class="blog-excerpt mb-4">
                            {!! \Illuminate\Support\Str::markdown($baiviet->Baiviet_excerpt) !!}
                        </div>
                    @endif

                    <!-- Ảnh phụ -->
                    <div class="row mb-4">
                        @if(!empty($baiviet->Baiviet_image_extra1))
                            <div class="col-sm-6 mb-3">
                                <img src="{{ asset('uploads/posts/' . $baiviet->Baiviet_image_extra1) }}" 
                                     alt="Extra Image 1" 
                                     class="img-fluid rounded">
                            </div>
                        @endif

                        @if(!empty($baiviet->Baiviet_image_extra2))
                            <div class="col-sm-6 mb-3">
                                <img src="{{ asset('uploads/posts/' . $baiviet->Baiviet_image_extra2) }}" 
                                     alt="Extra Image 2" 
                                     class="img-fluid rounded">
                            </div>
                        @endif
                    </div>

                    <!-- Nội dung chính (Markdown) -->
                    <div class="blog-content">
                        {!! \Illuminate\Support\Str::markdown($baiviet->Baiviet_content) !!}
                    </div>

                </div>

                <hr class="my-5">
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                <div class="blog-sidebar">

                    <!-- Danh mục -->
                    <div class="widget widget-category mb-4">
                        <h5 class="widget-title">Thuộc danh mục</h5>
                        <ul>
                            <li>{{ $baiviet->catgory_name }}</li>
                        </ul>
                    </div>

                    <!-- Các lớp học mới -->
                    <div class="widget widget-news">
                        <h5 class="widget-title">Các lớp học mới</h5>
                        <ul class="list-unstyled">
                            @foreach ($product as $sanpham)
                                <li class="mb-3 d-flex">
                                    <div class="me-3">
                                        <img src="{{ asset('uploads/product/' . $sanpham->product_image) }}" 
                                             alt="{{ $sanpham->product_name }}" 
                                             width="80"
                                             class="rounded">
                                    </div>
                                    <div>
                                        <h6 class="mb-1">
                                            <a href="{{ URL::to('/chitietkhoahoc/' . $sanpham->product_id) }}">
                                                {{ $sanpham->product_name }}
                                            </a>
                                        </h6>
                                        <small class="text-muted">
                                            {{ \Illuminate\Support\Str::limit($sanpham->product_desc, 60) }}
                                        </small>
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