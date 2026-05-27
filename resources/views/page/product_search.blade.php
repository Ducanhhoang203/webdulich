@include('clients.blocks.header')
<style>
    /* ====== CARD TOUR STYLE ====== */
.card {
  
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    background: #fff;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
}

/* Ảnh tour */
.card img {
    width: 100%;
    height: 230px;
    object-fit: cover;
    transition: transform 0.5s ease, filter 0.3s ease;
}

/* Zoom ảnh khi hover */
.card:hover img {
    transform: scale(1.08);
    filter: brightness(0.9);
}

/* Tiêu đề tour */
.card h5 {
    color: #333;
    font-weight: 600;
    margin-top: 10px;
    transition: color 0.3s ease;
    text-decoration: none;
}

.card:hover h5 {
    color: #fba628; /* Màu xanh nổi bật khi hover */
}

/* Mô tả */
.card p {
    color: #555;
    font-size: 15px;
}

/* Liên kết bao quanh */
.card a {
    text-decoration: none;
}
.canchinh {
    margin-top: 20px;
    justify-content: center;
}
.no-results {
    text-align: center;
    font-size: 20px;
    font-weight: 500;
    color: #555;
    background: #f8f9fa;
    border: 2px dashed #cfd8dc;
    border-radius: 12px;
    padding: 25px 20px;
    max-width: 500px;
    margin: 60px auto;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.no-results:hover {
    background: #eef7ff;
    border-color: #007bff;
    color: #007bff;
}


</style>
<div class="container py-5">

    @if($products->count())
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4 canchinh">
                    <div class="card">
                        <a href="{{ URL::To('/Chi-tiet-tour/'.$product->product_id) }}"><img src="{{ asset('uploads/product/' . $product->product_image) }}" class="card-img-top" alt=""></a>
                        <div class="card-body">
                          <a href="{{ URL::To('/Chi-tiet-tour/'.$product->product_id) }}">  <h5>{{ $product->product_name }}</h5></a>
                            <p>{{ $product->product_desc }}</p>
                            <p><strong>{{ number_format($product->product_price) }} VNĐ</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
       <div class="no-results">

    <p>Không tìm thấy tour nào phù hợp.</p>
</div>

    @endif
</div>
@include('clients.blocks.footer')
