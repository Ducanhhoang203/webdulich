@include('layoutadmin') {{-- Đổi @include thành @extends nếu 'layoutadmin' là layout chính --}}

@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    {{-- Tiêu đề trang: Danh sách Bài viết -> Danh sách Bài viết Du lịch/Cẩm nang --}}
                    <h2>Danh sách Bài viết Du lịch <small>Quản lý nội dung</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <br />
                    {{-- Hiển thị thông báo (Laravel Session) --}}
                    @php
                        $message = Session::get('message');
                    @endphp
                    @if ($message)
                        {{-- Nên sử dụng cú pháp Blade thay vì PHP thuần --}}
                        <span class="text-alert" style="color: green; font-weight: bold;">{{ $message }}</span>
                        @php
                            Session::put('message', null);
                        @endphp
                    @endif
                </div>

                <div class="x_content">
                    {{-- Nút Thêm mới --}}
                    <a href="{{ URL::to('/add-baiviet') }}" class="btn btn-success mb-3">Thêm Bài viết/Cẩm nang mới</a>
                    
                    {{-- Bảng danh sách --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Mã số</th> {{-- ID -> Mã số --}}
                                    <th>Tiêu đề chính</th> {{-- Tiêu đề bài viết* -> Tiêu đề chính --}}
                                    <th>Đường dẫn rút gọn</th> {{-- Mở đầu -> Đường dẫn rút gọn (Nếu Baiviet_slug là slug) --}}
                                    
                                    <th>Ảnh đại diện</th> {{-- Ảnh chính bài viết* -> Ảnh đại diện --}}
                                    <th>Ảnh phụ 1</th> {{-- Ảnh phụ 1 bài viết* -> Ảnh phụ 1 --}}
                                    <th>Ảnh phụ 2</th> {{-- Ảnh phụ 2 bài viết* -> Ảnh phụ 2 --}}
                                    <th>Tác giả</th> {{-- Baiviet_author -> Tác giả --}}
                                    <th>Chuyên mục</th> {{-- Baiviet_category -> Chuyên mục --}}
                                    <th>Trạng thái</th> {{-- Hiển thị -> Trạng thái --}}
                                    <th colspan="2">Thao tác</th> {{-- Hành động -> Thao tác --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_posts as $key => $posts)
                                    <tr>
                                        <td>{{ $posts->id }}</td>
                                        <td>{{ $posts->Baiviet_title }}</td>
                                        {{-- Giả định Baiviet_slug là slug/đường dẫn rút gọn --}}
                                        <td>{{ $posts->Baiviet_slug }}</td> 
                                        
                                        {{-- Hiển thị hình ảnh --}}
                                        <td><img src="uploads/posts/{{ $posts->Baiviet_image_main }}" alt="Ảnh đại diện" height="100" width="150"></td>
                                        <td><img src="uploads/posts/{{ $posts->Baiviet_image_extra1 }}" alt="Ảnh phụ 1" height="100" width="150"></td>
                                        <td><img src="uploads/posts/{{ $posts->Baiviet_image_extra2 }}" alt="Ảnh phụ 2" height="100" width="150"></td>
                                        
                                        <td>{{ $posts->Baiviet_author }}</td>
                                        <td>{{ $posts->catgory_name }}</td>
                                        
                                        {{-- Trạng thái Hiển thị --}}
                                        <td>
                                            @if ($posts->Baiviet_status == 0)
                                                <span class="badge badge-secondary">Tạm ẩn</span>
                                            @else
                                                <span class="badge badge-success">Đang hiển thị</span>
                                            @endif
                                        </td>
                                        
                                        {{-- Nút Sửa --}}
                                        <td>
                                            <a href="{{ URL::to('/edit-baiviet/' . $posts->id) }}" class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                        </td>
                                        
                                        {{-- Nút Xóa (có xác nhận) --}}
                                        <td>
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')" href="{{ URL::to('/delete-baiviet/' . $posts->id) }}" class="btn btn-danger btn-sm">Xóa</a>
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
