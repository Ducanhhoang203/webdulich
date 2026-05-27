@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">🔥 Top sản phẩm được yêu thích nhất</h2>

    <div class="row justify-content-center">
        @foreach($topProducts as $pro)
            <div class="col-xxl-3 col-xl-4 col-md-6 mb-4">
                <div class="destination-item shadow-sm">
                    <div class="image position-relative">
                        <img src="{{ asset('/uploads/product/'.$pro->product_image) }}" alt="{{ $pro->product_name }}" class="img-fluid rounded">
                        <div class="ratting"><i class="fas fa-heart text-danger"></i> {{ $pro->wishlists_count }}</div>
                    </div>
                    <div class="content p-3">
                        <span class="location"><i class="fal fa-map-marker-alt"></i> {{ $pro->brand_name }}</span>
                        <h5><a href="{{ url('/Chi-tiet-tour/'.$pro->product_id) }}">{{ $pro->product_name }}</a></h5>
                    </div>
                    <div class="destination-footer d-flex justify-content-between p-3 border-top">
                        <span class="price">${{ $pro->product_price }}/người</span>
                        <a href="{{ url('/Chi-tiet-tour/'.$pro->product_id) }}" class="text-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
