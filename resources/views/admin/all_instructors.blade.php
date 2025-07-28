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
              <th>Tên Giảng Viên </th>
             <th>Tiểu sử</th>
              <th>Hình ảnh </th>
              
              <th>Khóa Dạy</th>
              

   

              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_instructors as $key => $struct)
              <tr>
                <td>{{ $struct->instructors_id }}</td>
                <td>{{ $struct->instructors_name }}</td>
                <td>{{ $struct->instructors_bio }}</td>
                <td><img src="uploads/instructors/{{ $struct->instructors_image}}" alt="" height="100"width="150"></td>
                <td>{{ $struct->product_name }}</td>
                

                <td>
                  <a href="{{ URL::to('/edit-instructors/' . $struct->instructors_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-instructors/' . $struct->instructors_id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



