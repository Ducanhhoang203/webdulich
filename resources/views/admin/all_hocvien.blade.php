<style>
  .canchinh {
    margin-left: 15%;
  }
</style>

@include('layoutadmin')
@section('admin_content')
<div class="canchinh col-md-14 col-sm-14">
    <div class="x_panel">
        <div class="x_content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên học viên</th>
                        <th>Hình ảnh</th>
                        <th>Tiểu sử</th>
                        <th colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_gallery as $rv)
                        <tr>
                            <td>{{ $rv->id }}</td>
                            <td>{{ $rv->name }}</td>
                            <td>
                                @if($rv->avatar)
                                    <img src="{{ asset($rv->avatar) }}" alt="{{ $rv->name }}" height="100" width="100">
                                @else
                                    <span>Chưa có ảnh</span>
                                @endif
                            </td>
                            <td>{{ $rv->bio }}</td>
                            <td>
                                <a href="{{ URL::to('/edit-hocvien/'.$rv->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-hocvien/'.$rv->id) }}" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

