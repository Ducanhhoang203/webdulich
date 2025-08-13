@include('clients.blocks.header')

<!-- Contact Form Area start -->
<section class="contact-form-area py-70 rel z-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                
                {{-- Thông báo thành công --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Thông báo lỗi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="comment-form bgc-lighter z-1 rel mb-30 rmb-55">
                    <form id="contactForm" class="contactForm" name="contactForm" 
                          action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="section-title">
                            <h2>Liên hệ với chúng tôi</h2>
                        </div>
                        <p>Vui lòng nhập đầy đủ thông tin để nhận được tư vấn nhanh nhất</p>
                        <div class="row mt-35">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nhập tên</label>
                                    <input type="text" id="name" name="name" class="form-control" 
                                           placeholder="Tên của bạn :" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Nhập số điện thoại</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control" 
                                           placeholder="Số điện thoại của bạn :" value="{{ old('phone_number') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Nhập email</label>
                                    <input type="email" id="email" name="email" class="form-control" 
                                           placeholder="Nhập email :" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Khóa Học Cần Tư Vấn</label>
                                    <textarea name="message" id="message" class="form-control" rows="5" 
                                              placeholder="Nội dung" required>{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="theme-btn style-two">
                                        <span data-hover="Đăng Ký Ngay">Đăng Ký Nhận Hỗ Trợ</span>
                                        <i class="fal fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="contact-images-part" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <div class="row">
                        <div class="col-12">
                       
                            <img src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="Contact">
                        </div>
                        <div class="col-6">
                            <img src="{{URL::to($event->image)  }}" alt="Contact">
                        </div>
                        <div class="col-6">
                            <img src="{{ URl::to('uploads/instructors/'.$instructors->instructors_image) }}" alt="Contact">
                        </div>
                    </div>
                    <div class="circle-logo">
                        <img src="/assets/images/logos/favicon.png" alt="Logo">
                        <span class="title h2">Devpro</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form Area end -->

@include('clients.blocks.footer')
