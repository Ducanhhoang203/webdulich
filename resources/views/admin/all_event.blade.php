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
              <th>Title</th>
              <th>image </th>
              <th>Mô tả </th>

    

              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($events as $key => $eve)
              <tr>
                    <td>{{ $eve->id }}</td>
                <td>{{ $eve->title }}</td>
                <td><img src="{{ $eve->image }}" alt="" height="100" width="100"></td>
                <td>{{ $eve->category}}</td>


                
                <td>
                  <a href="{{ URL::to('/edit-event/' . $eve->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-event/' . $eve->id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



