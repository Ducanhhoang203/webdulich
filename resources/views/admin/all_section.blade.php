@include('layoutadmin')

@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách About Sections <small>quản lý</small></h2>
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
                    <a href="{{ url('/admin/about_sections/create') }}" class="btn btn-success mb-3">Thêm About Section mới</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image Main</th>
                                    <th>Description</th>
                                    <th>Experience Years</th>
                                    <th>Popular Destinations</th>
                                    <th>Satisfied Clients</th>
                                    <th>Shapes</th>
                                    <th colspan="2">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($about_sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->title }}</td>
                                        <td>
                                            @if($section->image_main)
                                                <img src="{{ asset('uploads/about/'.$section->image_main) }}" alt="Image Main" height="100" width="100">
                                            @else
                                                Không có ảnh
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($section->description, 100) }}</td>
                                        <td>{{ $section->experience_years }}</td>
                                        <td>{{ $section->popular_destinations }}</td>
                                        <td>{{ $section->satisfied_clients }}</td>
                                        <td>
                                            @if($section->shapes)
                                                @php $shapes = json_decode($section->shapes, true); @endphp
                                                @foreach ($shapes as $shape)
                                                    <img src="{{ asset($shape) }}" alt="Shape Image" height="50" width="50" style="margin-right: 5px;">
                                                @endforeach
                                            @else
                                                Không có shapes
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/about_sections/edit/' . $section->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                        </td>
                                        <td>
                                            <form action="{{ url('/admin/about_sections/delete/' . $section->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
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


