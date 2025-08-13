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
              <th>logo</th>
              <th>Mô tả</th>
              <th>slogan</th>

    

              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($footer_info as $key => $ft)
              <tr>
                    <td>{{ $ft->id }}</td>
                <td><img src="{{ $ft->logo_path }}" alt="" height="100" width="100"></td>
                <td>{{ $ft->description_text}}</td>
                <td>{{ $ft->slogan_text}}</td>

                
                <td>
                  <a href="{{ URL::to('/edit-footer/' . $ft->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-footer/' . $ft->id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



