@include('layoutadmin')
@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản Lý Mã Giảm Giá <small>Danh sách và thao tác</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <br />

                    {{-- Nút Thêm Mới --}}
                    <a href="{{ route('discount.create') }}" class="btn btn-success mb-2">Thêm mới</a>

                    {{-- Thông báo --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif
                </div>

                <div class="x_content">
                    {{-- Bảng mã giảm giá --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Mã</th>
                                    <th>Phần trăm giảm</th>
                                    <th>Ngày hết hạn</th>
                                    <th colspan="2">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($codes as $code)
                                <tr>
                                    <td>{{ $code->id }}</td>
                                    <td>{{ $code->code }}</td>
                                    <td>{{ $code->percent }}%</td>
                                    <td>{{ $code->expire_date ?? 'Không giới hạn' }}</td>
                                    <td>
                                        <a href="{{ route('discount.edit', $code->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('discount.destroy', $code->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa mã này?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Phân trang (nếu dùng paginate) --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $codes->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


