@include('layoutadmin') 

@section('admin_content')

<style>
    /* Toàn bộ khu vực nội dung rộng tối đa */
    .right_col.canchinh {
        /* Đảm bảo style này chỉ áp dụng nếu cần thiết, thường được định nghĩa trong layoutadmin */
        margin-left: 13%; 
        padding: 20px;
    }
    .text-alert {
        /* Thêm thuộc tính display: block; đã có trong code gốc */
        color: green; /* Đổi màu xanh để thông báo thành công */
        font-weight: bold;
        margin-bottom: 15px;
        display: block;
    }
    /* Tăng khoảng cách các ô table */
    table.table th, table.table td {
        padding: 12px 15px;
        vertical-align: middle; /* Căn giữa nội dung theo chiều dọc */
    }
    .btn-sm {
        padding: 5px 10px;
    }
</style>

<div class="right_col canchinh" role="main">
    <div class="container-fluid">
        <div class="row">
            {{-- Sử dụng col-12 để chiếm trọn chiều rộng --}}
            <div class="col-12">
                <div class="x_panel">
                    
                    {{-- KHỐI TIÊU ĐỀ --}}
                    <div class="x_title">
                        {{-- Danh sách Thương Hiệu -> Danh sách Nhà Cung Cấp --}}
                        <h2>Danh sách Loại Hình Tour <small>Quản lý</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <br />
                        
                        {{-- HIỂN THỊ THÔNG BÁO (Chuẩn hóa cú pháp Blade) --}}
                        @php
                            $message = Session::get('message');
                        @endphp
                        @if ($message)
                            <span class="text-alert">{{ $message }}</span>
                            @php
                                Session::put('message', null);
                            @endphp
                        @endif
                    </div>

                    {{-- KHỐI NỘI DUNG --}}
                    <div class="x_content">
                        {{-- Thêm Thương Hiệu mới -> Thêm Nhà Cung Cấp mới --}}
                        <a href="{{ URL::to('/add-brand-product') }}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i> Thêm Nhà Loại Hình Tour mới</a>
                        
                        <div class="table-responsive">
                            <form method="GET" action="{{ URL::to('/all-brand-product') }}" class="mb-3">
    <div class="row">

        {{-- Ô tìm kiếm theo tên --}}
        <div class="col-md-4">
            <input type="text" name="keyword" value="{{ request('keyword') }}"
                   class="form-control" placeholder="Tìm theo tên loại hình tour...">
        </div>

        {{-- Lọc theo trạng thái --}}
        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">-- Lọc trạng thái --</option>
                <option value="1" {{ request('status') == "1" ? 'selected' : '' }}>Đang hiển thị</option>
                <option value="0" {{ request('status') == "0" ? 'selected' : '' }}>Tạm ẩn</option>
            </select>
        </div>

        {{-- Nút lọc --}}
        <div class="col-md-2">
            <button class="btn btn-primary btn-block" type="submit">
                <i class="fa fa-filter"></i> Lọc
            </button>
        </div>

        {{-- Nút reset --}}
        <div class="col-md-2">
            <a href="{{ URL::to('/all-brand-product') }}" class="btn btn-secondary btn-block">
                Đặt lại
            </a>
        </div>
    </div>
</form>

                            <table class="table table-bordered table-hover w-100">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Mã số</th> {{-- ID -> Mã số --}}
                                        <th>Loại Hình Tour</th> {{-- Tên Thương Hiệu -> Tên Nhà Cung Cấp --}}
                                        <th>Mô tả</th> {{-- Đổi vị trí Mô tả lên trước Trạng thái --}}
                                        <th>Trạng thái hiển thị</th> {{-- Trạng thái -> Trạng thái hiển thị --}}
                                        <th colspan="2">Thao tác</th> {{-- Hành động -> Thao tác --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_brand_product as $key => $brand_pro)
                                        <tr>
                                            <td>{{ $brand_pro->brand_id }}</td>
                                            <td>{{ $brand_pro->brand_name }}</td>
                                            <td>{{ $brand_pro->brand_desc }}</td>
                                            <td>
                                                {{-- Hiển thị trạng thái --}}
                                                @if ($brand_pro->brand_status == 0)
                                                    <span class="badge badge-secondary">Tạm ẩn</span> {{-- Ẩn -> Tạm ẩn --}}
                                                @else
                                                    <span class="badge badge-success">Đang hiển thị</span> {{-- Hiện -> Đang hiển thị --}}
                                                @endif
                                            </td>
                                            
                                            {{-- Cột Sửa --}}
                                            <td>
                                                <a href="{{ URL::to('/edit-brand-product/' . $brand_pro->brand_id) }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                                    <i class="fa fa-edit"></i> Sửa
                                                </a>
                                            </td>
                                            
                                            {{-- Cột Xóa --}}
                                            <td>
                                                <a onclick="return confirm('Bạn có chắc muốn xóa Nhà Cung Cấp này không?')" href="{{ URL::to('/delete-brand-product/' . $brand_pro->brand_id) }}" class="btn btn-danger btn-sm" title="Xóa">
                                                    <i class="fa fa-trash"></i> Xóa
                                                </a>
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
</div>

