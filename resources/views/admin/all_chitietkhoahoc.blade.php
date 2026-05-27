@include('layoutadmin')

@section('admin_content')

<style>
    /* Chuyển style vào khối style chính thức hoặc để ở đây nếu không thể thay đổi file CSS ngoài */
    .canchinh{
        margin-left: 15%; 
    }
    /* Tăng khoảng cách và căn giữa ô */
    .table-bordered th, .table-bordered td {
        vertical-align: middle;
        padding: 10px;
    }
</style>

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý Chi tiết Tour <small>Danh sách nội dung</small></h2>
                    <div class="clearfix"></div>
                    <br />
                    {{-- Thêm nút Thêm mới --}}
                    <a href="{{ URL::to('/add-chitietkhoahoc') }}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i> Thêm Chi tiết Tour</a> 
                </div>

                <div class="x_content">
                    {{-- Thêm nút Thêm mới ở đây để dễ thấy hơn --}}
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover w-100">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Mã Chi tiết</th> {{-- ID -> Mã Chi tiết --}}
                                    <th>Tiêu đề Chi tiết</th> {{-- Tên tour -> Tiêu đề Chi tiết --}}
                                    <th style="width: 40%;">Nội dung Chi tiết</th> {{-- Mô tả ngắn -> Nội dung Chi tiết --}}
                                    <th>Tour Áp Dụng</th> {{-- Mô tả dài -> Tour Áp Dụng --}}
                                    <th colspan="2">Thao tác</th> {{-- Hành động -> Thao tác --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_chitiet as $key => $chitiet)
                                    <tr>
                                        <td>{{ $chitiet->curriculums_id }}</td>
                                        <td>{{ $chitiet->curriculums_title }}</td>
                                        {{-- Hiển thị nội dung chi tiết. Giới hạn ký tự nếu quá dài --}}
                                        <td>{{ Str::limit($chitiet->curriculums_content, 150) }}</td> 
                                        <td>{{ $chitiet->product_name }}</td>
                                        
                                        {{-- Cột Sửa --}}
                                        <td>
                                            <a href="{{ URL::to('/edit-chitietkhoahoc/' . $chitiet->curriculums_id) }}" class="btn btn-primary btn-sm" title="Chỉnh sửa chi tiết">
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                        </td>
                                        
                                        {{-- Cột Xóa --}}
                                        <td>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa chi tiết này không?')" href="{{ URL::to('/delete-chitietkhoahoc/' . $chitiet->curriculums_id) }}" class="btn btn-danger btn-sm" title="Xóa chi tiết">
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

