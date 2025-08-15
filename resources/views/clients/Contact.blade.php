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
                   <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="section-title">
                            <h2 style="color: black">Liên hệ với chúng tôi</h2>
                        </div>
                        <p>Vui lòng nhập đầy đủ thông tin để nhận được tư vấn nhanh nhất</p>

                        <div id="formAlert"></div> {{-- Nơi hiển thị thông báo AJAX --}}

                        <div class="row mt-35">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Tên của bạn" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone_number" class="form-control" placeholder="Số điện thoại" required>
                            </div>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" class="form-control" rows="5" placeholder="Khóa học cần tư vấn" required></textarea>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" id="btnSubmit" class="theme-btn style-two">
                                    <span data-hover="Đăng Ký Ngay">Đăng Ký Nhận Hỗ Trợ</span>
                                    <i class="fal fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>

{{-- Thêm đoạn script AJAX --}}
<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const form = document.getElementById('contactForm');
                        const btn = document.getElementById('btnSubmit');
                        const alertBox = document.getElementById('formAlert');

                        form.addEventListener('submit', function (e) {
                            e.preventDefault();
                            btn.disabled = true;
                            btn.innerHTML = 'Đang gửi...';

                            let formData = new FormData(form);

                            fetch(form.action, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                body: formData
                            })
                            .then(async res => {
                                let data;
                                try {
                                    data = await res.json();
                                } catch(e) {
                                    data = { status: 'success', message: 'Gửi thành công!' };
                                }

                                if (res.ok && data.status === 'success') {
                                    alertBox.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                                    form.reset();
                                } else {
                                    alertBox.innerHTML = `<div class="alert alert-danger">${data.message || 'Có lỗi xảy ra. Vui lòng thử lại.'}</div>`;
                                }
                            })
                            .catch(err => {
                                alertBox.innerHTML = `<div class="alert alert-danger">Có lỗi xảy ra. Vui lòng thử lại.</div>`;
                            })
                            .finally(() => {
                                btn.disabled = false;
                                btn.innerHTML = '<span data-hover="Đăng Ký Ngay">Đăng Ký Nhận Hỗ Trợ</span><i class="fal fa-arrow-right"></i>';
                            });
                        });
                    });
                    </script>
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
