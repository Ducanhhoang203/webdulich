@include('clients.blocks.header')

<!-- Gallery Area start -->
<section class="gallery-two-area py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($hocvien as $hv)
                <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
                    <div class="team-item hover-content" 
                         data-aos="fade-up" 
                         data-aos-delay="50" 
                         data-aos-duration="1500" 
                         data-aos-offset="50">
                        <img src="{{ asset($hv->avatar ?? 'uploads/default-avatar.png') }}" 
                             alt="{{ $hv->name }}" class="img-fluid">
                        <div class="content">
                            <h6>{{ $hv->name }}</h6>
                            <span>{{ $hv->bio }}</span>
                            <div class="social-style-one inner-content">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('clients.blocks.footer')
