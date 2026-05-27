@include('clients.blocks.header');
<style>.stars {
    display: inline-block;
    cursor: pointer;
}

.star {
    font-size: 20px;
    color: #ccc;
    transition: color 0.2s;
}

.star.hover,
.star.selected {
    color: #ffc107;
}

.comment-form {
    background-color: #f9f9f9;
}
</style>
<!-- Khu vực Tour Header -->
<section class="tour-header-area pt-70 rel z-1">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-7">
                <div class="tour-header-content mb-15" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <span class="location d-inline-block mb-10"><i class="fal fa-map-marker-alt"></i> Bali, Indonesia</span>
                    <div class="section-title pb-5">
                        <h2 style="color: black;">{{$product->product_name}}</h2>
                    </div>
                    <div class="ratting">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 text-lg-end" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                <div class="tour-header-social mb-10">
                    <a href="#"><i class="far fa-share-alt"></i>Chia sẻ tour</a>
                    <a href="#"><i class="fas fa-heart bgc-secondary"></i>Danh sách yêu thích</a>
                </div>
            </div>
        </div>
        <hr class="mt-50 mb-70">
    </div>
</section>
<!-- Kết thúc Tour Header -->

<!-- Khu vực Chi tiết Tour -->
<section class="tour-details-page pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tour-details-content">
                    <h3>Khám Phá Tour</h3>
                    <p>{!! \Illuminate\Support\Str::markdown($product->product_content) !!}</p>
                    
                    <div class="row pb-55">
                        <div class="col-md-12">
                            <div class="tour-include-exclude mt-30">
                                <h5>Đã bao gồm và Không bao gồm</h5>
                                <ul class="list-style-one check mt-25">
                                    <li>{{ $product->product_desc }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
      <!-- Mẫu hướng dẫn viên -->
      @foreach ($instructors as $instructor)
      <h6>Hướng dẫn viên</h6>
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="team-item hover-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
          <img src="{{ asset('/uploads/instructors/'.$instructor->instructors_image) }}" alt="Guide">
          <div class="content">
            <h6>{{ $instructor->instructors_name }}</h6>
           
            <div class="social-style-one inner-content">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </div>
      </div>
        @endforeach
      <!-- Có thể lặp lại thêm các hướng dẫn viên khác -->
    </div>
                
                <h3>Hoạt động</h3>
                <div class="tour-activities mt-30 mb-45">
                    <div class="tour-activity-item"><i class="flaticon-hiking"></i><b>Leo núi</b></div>
                    <div class="tour-activity-item"><i class="flaticon-fishing"></i><b>Câu cá</b></div>
                    <div class="tour-activity-item"><i class="flaticon-man"></i><b>Chèo kayak</b></div>
                    <div class="tour-activity-item"><i class="flaticon-kayak-1"></i><b>Kayak</b></div>
                    <div class="tour-activity-item"><i class="flaticon-bonfire"></i><b>Đốt lửa trại</b></div>
                    <div class="tour-activity-item"><i class="flaticon-flashlight"></i><b>Khám phá ban đêm</b></div>
                    <div class="tour-activity-item"><i class="flaticon-cycling"></i><b>Đạp xe</b></div>
                    <div class="tour-activity-item"><i class="flaticon-meditation"></i><b>Yoga</b></div>
                </div>

                <h3>Lịch trình</h3>
                <div class="accordion-two mt-25 mb-60" id="faq-accordion-two">
                    @foreach ($curriculums as $key => $fa)
                        @php $collapseId = 'collapseTwoOne' . $key; @endphp
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}">
                                    {{ $fa->curriculums_title }}
                                </button>
                            </h5>
                            <div id="{{ $collapseId }}" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                <div class="accordion-body">
                                    <p>{{ $fa->curriculums_content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

             

                <h3>Bản đồ</h3>
                <div class="tour-map mt-30 mb-50">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d96777.16150026117!2d-74.00840582560909!3d40.71171357405996!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1706508986625!5m2!1sen!2sbd" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- Nhận xét khách hàng -->
                <h3>Nhận Xét Khách Hàng</h3>
           <div class="reviews-list">
        @forelse($reviews as $review)
        <div class="review-item p-3 mb-3 bg-white rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <strong>{{ $review->name }}</strong>
               
            </div>
            <div class="review-stars mb-2">
                @php
                    $avg = round(($review->service_rating + $review->guide_rating + $review->price_rating + $review->safety_rating + $review->food_rating + $review->hotel_rating)/6);
                @endphp
                @for($i=1; $i<=5; $i++)
                    <i class="fas fa-star" style="color: {{ $i <= $avg ? '#ffc107' : '#ccc' }}"></i>
                @endfor
                <span class="ms-2 text-muted small">({{ $avg }}/5)</span>
            </div>
            <p class="mb-0">{{ $review->message }}</p>
        </div>
    @empty
        <p class="text-muted">Chưa có đánh giá nào cho tour này.</p>
    @endforelse
</div>

         


                <h3>Thêm Đánh Giá</h3>
              <form id="comment-form" class="comment-form bgc-lighter z-1 mt-30 p-4 rounded shadow-sm" 
      method="POST" 
      action="{{ route('tour.review.store', $product->product_id) }}">
    @csrf
    <h5 class="mb-3">Đánh Giá Tour</h5>

    @php
        $ratings = ['Dịch Vụ' => 'service_rating', 'Hướng Dẫn Viên' => 'guide_rating', 'Giá Cả' => 'price_rating', 'An Toàn' => 'safety_rating', 'Ẩm Thực' => 'food_rating', 'Khách Sạn' => 'hotel_rating'];
    @endphp

    <div class="comment-review-wrap mb-3">
        @foreach ($ratings as $label => $name)
            <div class="rating-item mb-2">
                <span class="title">{{ $label }}:</span>
                <div class="stars" data-input-name="{{ $name }}">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="far fa-star star" data-value="{{ $i }}"></i>
                    @endfor
                    <input type="hidden" name="{{ $name }}" value="0" required>
                </div>
            </div>
        @endforeach
    </div>

    <h5>Thông Tin Cá Nhân</h5>
    <div class="row gap-2 mb-3">
        <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Tên" value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
        </div>
        <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
        </div>
        <div class="col-md-6 mt-2">
            <input type="text" name="phone" class="form-control" placeholder="Số Điện Thoại">
        </div>
        <div class="col-md-12 mt-2">
            <textarea name="message" class="form-control" placeholder="Nhận Xét" rows="4" required></textarea>
        </div>
    </div>

    <button type="submit" class="theme-btn bgc-secondary style-two w-100 mt-2">
        <span data-hover="Gửi đánh giá">Gửi đánh giá</span>
        <i class="fal fa-arrow-right"></i>
    </button>
</form>


<!-- Hiển thị thông báo -->
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

            </div>

            <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                <div class="blog-sidebar tour-sidebar">
                    <div class="widget widget-booking" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h5 class="widget-title">Đặt Tour</h5>
                        <form action="{{ route('booking.store', $product2->product_id) }}" method="POST">
                            @csrf
                            <!-- Ngày bắt đầu -->
                            <div class="date mb-25"><b>Ngày Bắt Đầu</b><input type="date" name="start_date" required></div>
                            <hr>
                            <!-- Thời gian -->
                            <div class="time py-5">
                                <b>Thời Gian :</b>
                                <ul class="radio-filter">
                                    <li><input class="form-check-input" checked type="radio" name="time" id="time1" value="12:00">
                                        <label for="time1">12:00</label></li>
                                    <li><input class="form-check-input" type="radio" name="time" id="time2" value="08:00">
                                        <label for="time2">08:00</label></li>
                                </ul>
                            </div>
                            <hr class="mb-25">
                            <!-- Vé -->
                            <h6>Vé:</h6>
                            <ul class="tickets clearfix">
                                <li>
                                    Người lớn 
                                    <span class="price" id="priceAdultDisplay">{{ number_format($product2->product_price, 0, ',', '.') }} VNĐ</span>
                                    <select name="adult" id="adult" class="form-select">
                                        @for($i = 0; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </li>
                                <li>
                                    Trẻ em 
                                    <span class="price" id="priceChildDisplay">{{ number_format($product2->product_price * 0.5, 0, ',', '.') }} VNĐ</span>
                                    <select name="child" id="child" class="form-select">
                                        @for($i = 0; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </li>
                            </ul>
                            <hr class="mb-25">
                            <!-- Tổng giá -->
                            <h6>Tổng:</h6>
                            <input type="text" id="totalPrice" name="total_price" class="form-control" value="0 VNĐ" readonly>
                            <!-- Dịch vụ thêm -->
                            <ul class="radio-filter pt-5">
                                <li>
                                    <input class="form-check-input" checked type="radio" name="AddExtra" id="add-extra1" value="per_booking">
                                    <label for="add-extra1">Thêm dịch vụ cho mỗi đặt <span>{{ number_format(50000, 0, ',', '.') }} VNĐ</span></label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="radio" name="AddExtra" id="add-extra2" value="per_person">
                                    <label for="add-extra2">Thêm dịch vụ cho mỗi cá nhân <span>{{ number_format(24000, 0, ',', '.') }} VNĐ</span></label>
                                </li>
                            </ul>
                            <hr>
                            @auth
                                <button type="submit" class="theme-btn style-two w-100 mt-15 mb-5">
                                    <span data-hover="Đặt Ngay">Đặt Ngay</span>
                                    <i class="fal fa-arrow-right"></i>
                                </button>
                            @else
                                <button type="button" id="loginAlertBtn" class="theme-btn style-two w-100 mt-15 mb-5">
                                    <span data-hover="Đặt Ngay">Đặt Ngay</span>
                                    <i class="fal fa-arrow-right"></i>
                                </button>
                            @endauth
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SCRIPT TÍNH GIÁ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const priceAdult = Number({{ (float) $product2->product_price }});
    const priceChild = Number({{ (float) $product2->product_price * 0.5 }});
    const extraPerBooking = 50000;
    const extraPerPerson = 24000;

    const adultSelect = document.getElementById('adult');
    const childSelect = document.getElementById('child');
    const totalPriceInput = document.getElementById('totalPrice');
    const extraRadios = document.querySelectorAll('input[name="AddExtra"]');

    function calculateTotal() {
        const adults = parseInt(adultSelect.value) || 0;
        const children = parseInt(childSelect.value) || 0;
        const extraType = document.querySelector('input[name="AddExtra"]:checked').value;

        let total = (adults * priceAdult) + (children * priceChild);

        if (extraType === 'per_booking' && (adults + children) > 0) {
            total += extraPerBooking;
        } else if (extraType === 'per_person' && (adults + children) > 0) {
            total += (adults + children) * extraPerPerson;
        }

        totalPriceInput.value = total.toLocaleString('vi-VN') + " VNĐ";
    }

    adultSelect.addEventListener('change', calculateTotal);
    childSelect.addEventListener('change', calculateTotal);
    extraRadios.forEach(r => r.addEventListener('change', calculateTotal));

    calculateTotal();
});

document.addEventListener('DOMContentLoaded', function() {
    const loginAlertBtn = document.getElementById('loginAlertBtn');
    if (loginAlertBtn) {
        loginAlertBtn.addEventListener('click', function() {
            alert("⚠️ Bạn cần đăng nhập để đặt tour!");
            window.location.href = "{{ route('dangnhap') }}";
        });
    }
});
</script>
<script>
    document.querySelectorAll('.stars').forEach(starWrapper => {
    const hiddenInput = starWrapper.querySelector('input[type="hidden"]');
    const stars = starWrapper.querySelectorAll('.star');

    stars.forEach(star => {
        star.addEventListener('mouseover', () => {
            stars.forEach(s => s.classList.remove('hover'));
            for(let i=0;i<star.dataset.value;i++){
                stars[i].classList.add('hover');
            }
        });
        star.addEventListener('mouseout', () => {
            stars.forEach(s => s.classList.remove('hover'));
        });
        star.addEventListener('click', () => {
            hiddenInput.value = star.dataset.value;
            stars.forEach(s => s.classList.remove('selected'));
            for(let i=0;i<star.dataset.value;i++){
                stars[i].classList.add('selected');
            }
        });
    });
});

</script>

@include('clients.blocks.footer');
