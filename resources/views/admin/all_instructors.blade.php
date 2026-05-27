@include('layoutadmin')
@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách Hướng dẫn <small>quản lý</small></h2>
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
                    <a href="{{ URL::to('/add-instructors') }}" class="btn btn-success mb-3">Thêm Hướng dẫn mới</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên hướng dẫn</th>
                                    <th>Tiểu sử</th>
                                    <th>Hình ảnh</th>
                                    <th>Tour hướng dẫn</th>
                                    <th colspan="2">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_instructors as $key => $struct)
                                    <tr>
                                        <td>{{ $struct->instructors_id }}</td>
                                        <td>{{ $struct->instructors_name }}</td>
                                        <td>{{ $struct->instructors_bio }}</td>
                                        <td>
                                            <img src="uploads/instructors/{{ $struct->instructors_image }}" alt="Hình ảnh" height="100" width="150">
                                        </td>
                                        <td>{{ $struct->product_name }}</td>
                                        <td>
                                            <a href="{{ URL::to('/edit-instructors/' . $struct->instructors_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-instructors/' . $struct->instructors_id) }}" class="btn btn-danger btn-sm">Xóa</a>
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


