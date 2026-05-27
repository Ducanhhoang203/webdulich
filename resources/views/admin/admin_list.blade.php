@include('layoutadmin')
@section('admin_content')

<style>
    .right_col.canchinh {
        margin-left: 13%;
        padding: 20px;
    }
    .text-alert {
        color: red;
        font-weight: bold;
        margin-bottom: 15px;
        display: block;
    }
    table.table th, table.table td {
        padding: 12px 15px;
    }
    .btn-sm {
        padding: 5px 10px;
    }
</style>

<div class="right_col canchinh" role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách Admin <small>quản lý</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <br />

                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message', null);
                            }
                        ?>
                    </div>

                    <div class="x_content">
                        <a href="{{ URL::to('/add-admin') }}" class="btn btn-success mb-3">Thêm Admin mới</a>

                        <div class="table-responsive">
                            <form method="GET" action="{{ URL::to('/all_admin') }}" class="mb-3">

    <div class="row">

        {{-- Tìm kiếm theo email hoặc tên --}}
        <div class="col-md-4">
            <input type="text" name="keyword" value="{{ request('keyword') }}"
                class="form-control" placeholder="Tìm theo email hoặc tên...">
        </div>

        {{-- Lọc theo cấp --}}
        <div class="col-md-3">
            <select name="level" class="form-control">
                <option value="">-- Lọc theo cấp --</option>
                <option value="0" {{ request('level') == "0" ? 'selected' : '' }}>Admin cấp cao</option>
                <option value="1" {{ request('level') == "1" ? 'selected' : '' }}>Quản lý</option>
                <option value="2" {{ request('level') == "2" ? 'selected' : '' }}>Nhân viên</option>
            </select>
        </div>

        {{-- Nút lọc --}}
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fa fa-filter"></i> Lọc
            </button>
        </div>

        {{-- Reset --}}
        <div class="col-md-2">
            <a href="{{ URL::to('/all-admin') }}" class="btn btn-secondary btn-block">
                Reset
            </a>
        </div>

    </div>

</form>

                            <table class="table table-bordered table-hover w-100">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Tên</th>
                                        <th>SĐT</th>
                                        <th>Cấp</th>
                                        <th>Ngày tạo</th>
                                        <th colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_admin as $key => $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>

                                            <td>{{ $admin->admin_email }}</td>

                                            <td>{{ $admin->admin_name }}</td>

                                            <td>{{ $admin->admin_phone }}</td>

                                            <td>
                                                @if ($admin->admin_level == 0)
                                                    <span class="badge badge-secondary">Admin cấp cao</span>
                                                @elseif ($admin->admin_level == 1)
                                                    <span class="badge badge-info">Quản lý</span>
                                                @else
                                                    <span class="badge badge-success">Nhân Viên</span>
                                                @endif
                                            </td>

                                            <td>{{ $admin->created_at }}</td>

                                            <td>
                                                <a href="{{ URL::to('/edit-admin/' . $admin->id) }}" 
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i> Sửa
                                                </a>
                                            </td>

                                            <td>
                                                <a onclick="return confirm('Bạn có chắc muốn xóa admin này?')" 
                                                   href="{{ URL::to('/delete-admin/' . $admin->id) }}" 
                                                   class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Xóa
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div> <!-- x_content -->
                </div>
            </div>
        </div>
    </div>
</div>

