@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách Menu<small>quản lý</small></h2>
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
                    <a href="{{ route('menus.create') }}" class="btn btn-success mb-3">Thêm Menu mới</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Menu cha</th>
                                <th>Thứ tự</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($menus as $menu)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->url }}</td>
                                <td>---</td>
                                <td>{{ $menu->order }}</td>
                                <td>{{ $menu->status ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td>
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                                    <a href="{{ route('menus.destroy', $menu->id) }}" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</a>
                                </td>
                            </tr>

                            @php
                                $childMenus = $children->where('parent_id', $menu->id);
                            @endphp

                            @foreach($childMenus as $child)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>— {{ $child->title }}</td>
                                <td>{{ $child->url }}</td>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $child->order }}</td>
                                <td>{{ $child->status ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td>
                                    <a href="{{ route('menus.edit', $child->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                                    <a href="{{ route('menus.destroy', $child->id) }}" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</a>
                                </td>
                            </tr>
                            @endforeach

                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

