@include('clients.blocks.header')

<!-- Gallery Area start -->
<section class="gallery-two-area py-100 rel z-1">
    <div class="container">
        <div class="row">
            @foreach ($hocvien as $key => $hv)
                <div class="col-lg-4 col-sm-6">
                    <div class="gallery-two-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <img src="{{ URL::to($hv->image_path) }}" alt="{{ $hv->alt_text }}">
                        </div>
                       
                    </div>
                </div>
            @endforeach 
            <div class="col-lg-12 text-center">
                <!-- Nếu cần thêm nút hoặc nội dung khác -->
            </div>
        </div>
    </div>
</section>

@include('clients.blocks.footer')
