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
              <th>curriculum_title</th>
              <th>curriculum content</th>
              <th>Khóa học </th>
            <th></th>
              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_chitiet as $key => $chitiet)
              <tr>
                <td>{{ $chitiet->curriculums_id }}</td>
                <td>{{ $chitiet->curriculums_title }}</td>
                <td>{{ $chitiet->curriculums_content }}</td>

                <td>{{ $chitiet->product_name }}</td>
                
                
                <td>
                  <a href="{{ URL::to('/edit-chitietkhoahoc/' . $chitiet->curriculums_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-chitietkhoahoc/' . $chitiet->curriculums_id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



