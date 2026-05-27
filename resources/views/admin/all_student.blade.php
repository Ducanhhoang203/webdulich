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
              <th>Tên Tour</th>
             <th>student_email</th>
              <th>Tên Tour</th>
           
              <th>Số Điện Thoại</th>
              <th>Trang thái</th>
              <th>Mô tả</th>
              

   

              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_student as $key => $student_pro)
              <tr>
                <td>{{ $student_pro->student_id }}</td>
                <td>{{ $student_pro->student_name }}</td>
                <td>{{ $student_pro->student_email }}</td>
                <td>{{ $student_pro->product_name }}</td>
                <td>{{ $student_pro->student_phone }}</td>

                <td>
                  @if ($student_pro->student_status == 0)
                    <span class="badge badge-secondary">Ẩn</span>
                  @else
                    <span class="badge badge-success">Hiện</span>
                  @endif
                </td>
                <td>{{ $student_pro->student_note }}</td>
               
                <td>
                  <a href="{{ URL::to('/edit-student/' . $student_pro->student_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-student/' . $student_pro->student_id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



