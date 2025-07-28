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
              <th>Tên danh mục</th>
              <th>Trạng thái</th>
              <th>Mô tả</th>
              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_category_product as $key => $cate_pro)
              <tr>
                <td>{{ $cate_pro->catgory_id }}</td>
                <td>{{ $cate_pro->catgory_name }}</td>
                <td>
                  @if ($cate_pro->catgory_status == 0)
                    <span class="badge badge-secondary">Ẩn</span>
                  @else
                    <span class="badge badge-success">Hiện</span>
                  @endif
                </td>
                <td>{{ $cate_pro->catgory_desc }}</td>
                <td>
                  <a href="{{ URL::to('/edit-cartegory-product/' . $cate_pro->catgory_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-cartegory-product/' . $cate_pro->catgory_id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



