@include('layoutadmin')
@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách Footer <small>quản lý</small></h2>
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
                    <a href="{{ URL::to('/add-footer') }}" class="btn btn-success mb-3">Thêm Footer mới</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Logo</th>
                                    <th>Mô tả</th>
                                    <th>Slogan</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($footer_info as $key => $ft)
                                    <tr>
                                        <td>{{ $ft->id }}</td>
                                        <td><img src="{{ $ft->logo_path }}" alt="Logo" height="60" width="200"></td>
                                        <td>{{ $ft->description_text }}</td>
                                        <td>{{ $ft->slogan_text }}</td>
                                        <td>
                                            <a href="{{ URL::to('/edit-footer/' . $ft->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-footer/' . $ft->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</a>
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
