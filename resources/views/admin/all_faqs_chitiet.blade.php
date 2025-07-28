<style>
  .canchinh{
margin-left: 15%; 
}
</style>
@include('layoutadmin')
@section('admin_content')
  <div class="canchinh col-md-14 col-sm-14">
    <div class="x_panel">
      <div class="x_content">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>faqs title</th>
              <th>faqs </th>
              <th>Câu trả lời trang chi tiết</th>
            <th>Khóa Học</th>
            <th>Trang Thái</th>

              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($faqs_chitiet as $key => $chitiet)
              <tr>
                <td>{{ $chitiet->faqs_chitiet_id }}</td>
                <td>{{ $chitiet->faqs_chitiet_title }}</td>
                <td>{{ $chitiet->faqs_chitiet_cauhoi}}</td>

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



