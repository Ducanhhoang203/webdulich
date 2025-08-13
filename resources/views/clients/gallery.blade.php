@include('clients.blocks.header');
    
        
        <!-- Gallery Area start -->
        <section class="gallery-two-area py-100 rel z-1">
            <div class="container">
               
                <div class="row">
                   
               
                   @foreach ($all_baiviet as $key =>$baiviet)
                        <div class="col-lg-4 col-sm-6">
                        <div class="gallery-two-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" data-aos-delay="100">
                            <div class="image">
                              <img src="{{ asset('uploads/posts/' . $baiviet->Baiviet_image_main) }}" alt="Gallery">
                                <a href="{{ URL::to('/chitietbaiviet/'.$baiviet->id) }}" class="link"><i class="fal fa-arrow-right"></i></a>
                            </div>
                             <div class="content">
                                <span class="category">{{ $baiviet->Baiviet_slug  }}</span>
                                <h5><a href="{{ URL::to('/chitietbaiviet/'.$baiviet->id) }}">{{ $baiviet->Baiviet_title }}</a></h5>
                            </div>
                        </div>
                    </div>
                   @endforeach
                    <div class="col-lg-12 text-center">
                  {{ $all_baiviet->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </section>
       
           
        @include('clients.blocks.footer');