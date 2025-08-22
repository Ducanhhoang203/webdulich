<style></style>
@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh Sách Banner</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix">
                        <br />
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message', null);
                        }
                        ?>
                    </div>
                </div>
                <div class="x_content">

                    <a href="{{ url('/add-banner') }}" class="btn btn-success mb-3">+ Thêm Banner</a>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Tiêu đề</th>
                                <th width="35%">Hình ảnh</th>
                                <th width="15%">Ngày tạo</th>
                                <th width="15%">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_banner as $banner)
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->tile_baner }}</td>
                                    <td>
                                        <img src="{{ asset($banner->image) }}" alt="{{ $banner->tile_baner }}" width="150">
                                    </td>
                                    <td>{{ $banner->created_at }}</td>
                                    <td>
                                        <a href="{{ url('/edit-banner/'.$banner->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                        <a href="{{ url('/delete-banner/'.$banner->id) }}" onclick="return confirm('Bạn có chắc muốn xóa banner này?')" class="btn btn-danger btn-sm">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $all_banner->links('pagination::bootstrap-5') !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

