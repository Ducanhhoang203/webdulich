@include('layoutadmin')
@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách FAQ chi tiết <small>quản lý</small></h2>
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
                    <a href="{{ URL::to('/add-faqs-chitiet') }}" class="btn btn-success mb-3">Thêm FAQ mới</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Câu hỏi</th>
                                    <th>Câu trả lời</th>
                                    <th>Tour</th>
                                    <th>Trạng thái</th>
                                    <th colspan="2">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs_chitiet as $key => $chitiet)
                                    <tr>
                                        <td>{{ $chitiet->faqs_chitiet_id }}</td>
                                        <td>{{ $chitiet->faqs_chitiet_title }}</td>
                                        <td>{{ $chitiet->faqs_chitiet_cauhoi }}</td>
                                        <td>{{ $chitiet->faqs_chitiet_cautraloi }}</td>
                                        <td>{{ $chitiet->product_name }}</td>
                                        <td>
                                            @if ($chitiet->faqs_chitiet_status == 0)
                                                <span class="badge badge-secondary">Ẩn</span>
                                            @else
                                                <span class="badge badge-success">Hiện</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('/edit-faqs-chitiet/' . $chitiet->faqs_chitiet_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-faqs-chitiet/' . $chitiet->faqs_chitiet_id) }}" class="btn btn-danger btn-sm">Xóa</a>
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

