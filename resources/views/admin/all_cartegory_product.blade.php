{{-- Nên sử dụng @extends thay vì @include nếu 'layoutadmin' là layout cha --}}
@include('layoutadmin') 

@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        {{-- Sửa lỗi cú pháp: col-md-14 không tồn tại. Sử dụng col-md-12 để chiếm trọn chiều rộng. --}}
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                
                {{-- KHỐI TIÊU ĐỀ --}}
                <div class="x_title">
                    {{-- Tiêu đề: Danh sách Danh mục sản phẩm -> Danh sách Chuyên mục --}}
                    <h2>Danh sách Chuyên mục Sản phẩm <small>Quản lý</small></h2>
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
                        {{-- Nên thêm style để thông báo nổi bật hơn --}}
                        <span class="text-alert" style="color: green; font-weight: bold;">{{ $message }}</span>
                        @php
                            Session::put('message', null);
                        @endphp
                    @endif
                </div>
                
                {{-- KHỐI NỘI DUNG --}}
                <div class="x_content">
                    {{-- Nút Thêm mới --}}
                    <a href="{{ URL::to('/add-cartegory-product') }}" class="btn btn-success mb-3">Thêm chuyên mục mới</a>
                    
                    {{-- BẢNG DANH SÁCH --}}
                    <table class="table table-bordered table-hover"> {{-- Thêm class table-hover để dễ nhìn --}}
                        <thead class="thead-dark">
                            <tr>
                                <th>Mã số</th> {{-- ID -> Mã số --}}
                                <th>Tên chuyên mục</th> {{-- Tên danh mục -> Tên chuyên mục --}}
                                <th>Mô tả</th> {{-- Đổi vị trí Mô tả lên trước Trạng thái --}}
                                <th>Trạng thái</th> {{-- Trạng thái -> Trạng thái hiển thị --}}
                                <th colspan="2">Thao tác</th> {{-- Hành động -> Thao tác --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_category_product as $key => $cate_pro)
                                <tr>
                                    <td>{{ $cate_pro->catgory_id }}</td>
                                    <td>{{ $cate_pro->catgory_name }}</td>
                                    <td>{{ $cate_pro->catgory_desc }}</td> {{-- Đã đổi vị trí --}}
                                    <td>
                                        {{-- Trạng thái hiển thị --}}
                                        @if ($cate_pro->catgory_status == 0)
                                            <span class="badge badge-secondary">Tạm ẩn</span> {{-- Ẩn -> Tạm ẩn --}}
                                        @else
                                            <span class="badge badge-success">Đang hiển thị</span> {{-- Hiện -> Đang hiển thị --}}
                                        @endif
                                    </td>
                                    
                                    {{-- Cột Sửa --}}
                                    <td>
                                        <a href="{{ URL::to('/edit-cartegory-product/' . $cate_pro->catgory_id) }}" class="btn btn-primary btn-sm" title="Chỉnh sửa"><i class="fa fa-edit"></i> Sửa</a>
                                    </td>
                                    
                                    {{-- Cột Xóa --}}
                                    <td>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa chuyên mục này không?')" href="{{ URL::to('/delete-cartegory-product/' . $cate_pro->catgory_id) }}" class="btn btn-danger btn-sm" title="Xóa"><i class="fa fa-trash"></i> Xóa</a>
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

