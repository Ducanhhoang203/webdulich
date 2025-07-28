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
              <th>Tên Môn </th>
             <th>Giá</th>
              <th>Hình ảnh </th>
              <th>Danh mục</th>
              <th>Khóa học</th>
              <th>Trang thái</th>
              <th>Mô tả</th>
              <th>Nội dung </th>

   

              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_product as $key => $product_pro)
              <tr>
                <td>{{ $product_pro->product_id }}</td>
                <td>{{ $product_pro->product_name }}</td>
                <td>{{ $product_pro->product_price }}</td>
                <td><img src="uploads/product/{{ $product_pro->product_image}}" alt="" height="100"width="150"></td>
                <td>{{ $product_pro->catgory_name }}</td>
                <td>{{ $product_pro->brand_name }}</td>

                <td>
                  @if ($product_pro->product_status == 0)
                    <span class="badge badge-secondary">Ẩn</span>
                  @else
                    <span class="badge badge-success">Hiện</span>
                  @endif
                </td>
                <td>{{ $product_pro->product_desc }}</td>
                <td>{{ $product_pro->product_content }}</td>
                <td>
                  <a href="{{ URL::to('/edit-product/' . $product_pro->product_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-product/' . $product_pro->product_id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



