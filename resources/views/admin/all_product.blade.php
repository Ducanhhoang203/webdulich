@include('layoutadmin') 

@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                
                {{-- KHỐI TIÊU ĐỀ --}}
                <div class="x_title">
                    {{-- Tiêu đề trang --}}
                    <h2>Danh sách Tour <small>Quản lý Tour</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <br />
                    
                    {{-- HIỂN THỊ THÔNG BÁO --}}
                    @php
                        $message = Session::get('message');
                    @endphp
                    @if ($message)
                        {{-- Thêm style để thông báo nổi bật và nhất quán --}}
                        <span class="text-alert" style="color: green; font-weight: bold;">{{ $message }}</span>
                        @php
                            Session::put('message', null);
                        @endphp
                    @endif
                </div>

                {{-- KHỐI NỘI DUNG --}}
                <div class="x_content">
                    {{-- Nút Thêm mới --}}
                    <a href="{{ URL::to('/add-product') }}" class="btn btn-success mb-3">Thêm Tour mới</a>
                    {{-- FORM TÌM KIẾM & LỌC --}}
<form action="{{ URL::to('/all-product') }}" method="GET" class="mb-3">

    <div class="row">

        {{-- Tìm theo tên --}}
        <div class="col-md-4">
            <input type="text" name="keyword" class="form-control"
                placeholder="Nhập tên Tour..."
                value="{{ request('keyword') }}">
        </div>

        {{-- Lọc theo Loại hình tour --}}
        <div class="col-md-3">
            <select name="category" class="form-control">
                <option value="">-- Loại hình Tour --</option>
                @foreach ($all_categories as $cate)
                    <option value="{{ $cate->catgory_id }}" 
                        {{ request('category') == $cate->catgory_id ? 'selected' : '' }}>
                        {{ $cate->catgory_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Lọc theo Nhà cung cấp --}}
        <div class="col-md-3">
            <select name="brand" class="form-control">
                <option value="">-- Loại hình tour--</option>
                @foreach ($all_brands as $brand)
                    <option value="{{ $brand->brand_id }}" 
                        {{ request('brand') == $brand->brand_id ? 'selected' : '' }}>
                        {{ $brand->brand_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nút tìm --}}
        <div class="col-md-2">
            <button class="btn btn-primary btn-block">Tìm kiếm</button>
        </div>

    </div>

</form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Mã Tour</th>
                                    <th>Tên Tour</th>
                                    <th>Giá (VNĐ)</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Loại hình Tour</th>
                                    <th>Nhà Cung Cấp</th>
                                    <th>Trạng thái</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_product as $key => $product_pro)
                                    <tr>
                                        <td>{{ $product_pro->product_id }}</td>
                                        <td>{{ $product_pro->product_name }}</td>
                                        {{-- Định dạng giá tiền --}}
                                        <td>{{ number_format($product_pro->product_price, 0, ',', '.') }}</td> 
                                        {{-- Đường dẫn ảnh dùng asset() --}}
                                        <td><img src="{{ asset('uploads/product/' . $product_pro->product_image) }}" alt="Hình ảnh Tour" height="100" width="150" style="object-fit: cover;"></td> 
                                        <td>{{ $product_pro->catgory_name }}</td>
                                        <td>{{ $product_pro->brand_name }}</td>
                                        <td>
                                            {{-- Hiển thị trạng thái --}}
                                            @if ($product_pro->product_status == 0)
                                                <span class="badge badge-secondary">Tạm ẩn</span>
                                            @else
                                                <span class="badge badge-success">Đang hiển thị</span>
                                            @endif
                                        </td>
                                        
                                        {{-- Cột Sửa --}}
                                        <td>
                                            <a href="{{ URL::to('/edit-product/' . $product_pro->product_id) }}" class="btn btn-primary btn-sm" title="Chỉnh sửa Tour"><i class="fa fa-edit"></i> Sửa</a>
                                        </td>
                                        
                                        {{-- Cột Xóa --}}
                                        <td>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa Tour này không?')" href="{{ URL::to('/delete-product/' . $product_pro->product_id) }}" class="btn btn-danger btn-sm" title="Xóa Tour"><i class="fa fa-trash"></i> Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

