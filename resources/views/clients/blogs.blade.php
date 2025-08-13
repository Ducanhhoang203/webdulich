
@include('clients.blocks.header');
        
        
        <!-- Blog List Area start -->
        <section class="blog-list-page py-100 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($products as $key => $pro)
                            <div class="blog-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="{{ asset('uploads/product/'.$pro->product_image) }}" alt="Blog">
                            </div>
                            <div class="content">
                                <a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}" class="category">{{ $pro->product_name }}</a>
                                <h5>{{ $pro->product_desc }}</h5>
                                <ul class="blog-meta">
                                    
                                    <li><i class="fas fa-money-bill"></i>{{ $pro->product_price }}<span> VNĐ</span></li>
                                   
                                </ul>
                                <p>{{ $pro->product_content }}</p>
                                <a href="{{URL::to('/contact') }}" class="theme-btn style-two style-three">
                                    <span data-hover="Đăng ký ">bấm vào xem </span>
                                    <i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
  <div class="col-lg-12">
      {{ $products->links('pagination::bootstrap-4') }}

                        {{-- <ul class="pagination pt-15 flex-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <li class="page-item disabled">
                                <span class="page-link"><i class="far fa-chevron-left"></i></span>
                            </li>
                            <li class="page-item active">
                                <span class="page-link">
                                    1
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="far fa-chevron-right"></i></a>
                            </li>
                        </ul> --}}
                          </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                        <div class="blog-sidebar">
                            
                            <div class="widget widget-search" data-aos="fade-up" data-aos-duration="2000" data-aos-offset="50">
                                <form action="{{ route('blogs.search') }}"method="GET" class="default-search-form">
                                         <div style="position: relative;">
                                    <input type="text" id="search-box" name="keyword" placeholder="Tìm kiếm..." value="{{ request('keyword') }}">
                                     <div id="suggestions-box"  style="position: absolute; background: white; z-index: 999; width: 100%; display: none;" ></div>
                                         </div>
                                    <button type="submit" ></button>
                                </form>
             

                            </div>
                            
                      
                                <div class="widget widget-category" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="widget-title">Danh Mục</h5>
                                @foreach ($category as $key =>$dm)
                                    <ul class="list-style-three">
                                    <li><a href="{{ URL::to('/danh-muc-san-pham/{catgory_id}') }}">{{$dm->catgory_name}}</a></li>
                                 
                                 
                                </ul>
                                @endforeach
                            </div>
                   
                            
                            <div class="widget widget-news" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="widget-title">Các khóa học mới nhất </h5>
                               
                                    <ul>
                                         @foreach ($products as $key =>$pro)
                                    <li>
                                        <div class="image">
                                            <img src="{{ asset('uploads/product/'.$pro->product_image) }}" alt="News">
                                        </div>
                                        <div class="content">
                                            <h6><a href="{{ URL::to('/chitietkhoahoc/'.$pro->product_id) }}">{{ $pro->product_desc }}</a></h6>
                                            <span class="date"><i class=""></i> {{ $pro->product_price }} VNĐ</span>
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
        <!-- Blog List Area end -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-box').keyup(function() {
        let query = $(this).val();
        if (query.length > 1) {
            $.ajax({
                url: "/search-suggest",
                method: "GET",
                data: { query: query },
                success: function(data) {
                    let suggestions = '';
                    data.forEach(function(item) {
                        suggestions += `<div class="suggest-item" data-id="${item.id}">${item.name}</div>`;
                    });
                    $('#suggestions-box').html(suggestions).show();
                }
            });
        } else {
            $('#suggestions-box').hide();
        }
    });

    $(document).on('click', '.suggest-item', function() {
        $('#search-box').val($(this).text());
        $('#suggestions-box').hide();
        $('form').submit();
    });
});
</script>


      @include('clients.blocks.footer');