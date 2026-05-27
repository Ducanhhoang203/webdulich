
@include('clients.blocks.header');
<style>
    /* =======================
   Wishlist - Du lịch đẹp
   ======================= */

/* Tổng thể trang */
body {
    background: linear-gradient(120deg, #f0f9ff 0%, #cbebff 100%);
    font-family: 'Poppins', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Tiêu đề */
.container h2 {
    text-align: center;
    font-weight: 700;
    color: #0078ff;
    margin: 40px 0 30px;
    position: relative;
}

.container h2::after {
    content: "";
    display: block;
    width: 60px;
    height: 3px;
    background: #00aaff;
    margin: 10px auto 0;
    border-radius: 3px;
}

/* Card tour yêu thích */
.card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    background: #fff;
    transition: all 0.3s ease-in-out;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

/* Ảnh tour */
.card-img-top {
    height: 220px;
    object-fit: cover;
    border-bottom: 3px solid #00aaff;
}

/* Nội dung card */
.card-body {
    padding: 20px;
    text-align: center;
}

.card-body h5 {
    font-weight: 600;
    color: #004d80;
    margin-bottom: 10px;
}

.card-body p {
    color: #0099cc;
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 15px;
}

/* Nút xem chi tiết */
.card-body .btn-primary {
    background: linear-gradient(45deg, #00aaff, #00cc99);
    border: none;
    border-radius: 25px;
    padding: 8px 20px;
    color: white;
    font-weight: 600;
    transition: 0.3s;
}

.card-body .btn-primary:hover {
    background: linear-gradient(45deg, #0099cc, #00aa77);
    transform: scale(1.05);
}

/* Hiệu ứng khi không có dữ liệu */
.no-wishlist {
    text-align: center;
    font-size: 18px;
    color: #666;
    padding: 40px 0;
}

</style>
<div class="container">
    <h2>Danh sách yêu thích</h2>
    <div class="row">
        @foreach($wishlists as $item)
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="{{ asset('/uploads/product/'.$item->product->product_image) }}" class="card-img-top">
                    <div class="card-body">
                        <h5>{{ $item->product->product_name }}</h5>
                        <p>${{ $item->product->product_price }}</p>
                        <a href="{{ URL::to('/Chi-tiet-tour/'.$item->product->product_id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('clients.blocks.footer');
