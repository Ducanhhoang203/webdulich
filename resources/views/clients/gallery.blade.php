@include('clients.blocks.header')

<style>
/* Thu nhỏ ảnh trong gallery */
.gallery-two-item .image img {
    width: 100%;
    height: 200px; /* cố định chiều cao để layout đều */
    object-fit: cover;
    border-radius: 6px;
    transition: transform 0.3s ease;
}

.gallery-two-item .image img:hover {
    transform: scale(1.05);
}

/* Giới hạn nội dung */
.gallery-two-item .excerpt {
    margin-top: 10px;
    font-size: 14px;
    color: #666;
    min-height: 60px; /* giữ layout đều */
}
</style>

<!-- Gallery Area start -->
<section class="gallery-two-area py-100 rel z-1">
    <div class="container">
        <div class="row">

            @forelse ($all_baiviet as $baiviet)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="gallery-two-item"
                         data-aos="fade-up"
                         data-aos-duration="1500"
                         data-aos-offset="50">

                        {{-- Image --}}
                        <div class="image">
                            <img src="{{ asset('uploads/posts/' . $baiviet->Baiviet_image_main) }}"
                                 alt="{{ $baiviet->Baiviet_title }}">

                            <a href="{{ url('/chitietbaiviet/'.$baiviet->id) }}" class="link">
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>

                        {{-- Content --}}
                        <div class="content">

                            {{-- Category --}}
                            <span class="category">
                                {{ $baiviet->Baiviet_slug }}
                            </span>

                            {{-- Title --}}
                            <h5>
                                <a href="{{ url('/chitietbaiviet/'.$baiviet->id) }}">
                                    {{ $baiviet->Baiviet_title }}
                                </a>
                            </h5>

                            {{-- Nội dung Markdown rút gọn --}}
                            <div class="excerpt">
                                {!! \Illuminate\Support\Str::limit(
                                    strip_tags(
                                        \Illuminate\Support\Str::markdown($baiviet->Baiviet_content)
                                    ),
                                    150
                                ) !!}
                            </div>

                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center">
                    <p>Chưa có bài viết nào.</p>
                </div>
            @endforelse

            {{-- Pagination --}}
            <div class="col-lg-12 text-center mt-4">
                {{ $all_baiviet->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
</section>
<!-- Gallery Area end -->

@include('clients.blocks.footer')