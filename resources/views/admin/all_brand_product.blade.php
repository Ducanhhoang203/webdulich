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
              <th>Tên khóa học</th>
              <th>Trạng thái</th>
              <th>Mô tả</th>
              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_brand_product as $key => $brand_pro)
              <tr>
                <td>{{ $brand_pro->brand_id }}</td>
                <td>{{ $brand_pro->brand_name }}</td>
                <td>
                  @if ($brand_pro->brand_status == 0)
                    <span class="badge badge-secondary">Ẩn</span>
                  @else
                    <span class="badge badge-success">Hiện</span>
                  @endif
                </td>
                <td>{{ $brand_pro->brand_desc }}</td>
                <td>
                  <a href="{{ URL::to('/edit-brand-product/' . $brand_pro->brand_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-brand-product/' . $brand_pro->brand_id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



