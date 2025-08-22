@include('clients.blocks.header');

        <section class="gallery-two-area py-100 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        
                    </div>
                </div>
                    <div class="row">
                        @foreach ($event as $key => $eva)
                    <div class="col-lg-4 col-sm-6">
                        <div class="gallery-two-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ $eva->image }}" alt="Gallery">
                             
                            </div>
                            <div class="content">
                                <span class="category">{{ $eva->category }}</span>
                                <h5><a href="#"> {{ $eva->title }}</a></h5>
                            </div>
                        </div>
                    </div>    
                       @endforeach  
                    </div>
           
     </div>
            </div>
        </section>   
        @include('clients.blocks.footer');