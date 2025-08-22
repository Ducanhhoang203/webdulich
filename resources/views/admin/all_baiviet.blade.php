<style>
  .canchinh {
    margin-left: 10%;
   
    margin-top: 30px;
  }

  .table {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .table th {
    background-color: #2c3e50;
    color: white;
    text-align: center;
    vertical-align: middle;
  }

  .table td {
    vertical-align: middle;
    text-align: center;
    font-size: 14px;
  }

  .table img {
    object-fit: cover;
    border-radius: 4px;
    border: 1px solid #ddd;
  }

  .btn-sm {
    padding: 5px 10px;
    font-size: 13px;
  }

  .badge-secondary {
    background-color: #95a5a6;
  }

  .badge-success {
    background-color: #27ae60;
  }

  .x_panel {
    padding: 20px;
    border-radius: 10px;
    background: #f7f9fa;
    border: 1px solid #ddd;
  }

  .x_content {
    overflow-x: auto;
  }
</style>

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
              <th>Tiêu đề bài viết* </th>
              <th>Mở đầu  </th>
              <th>Nội dung bài viết  </th>
              <th>Tóm tắt</th>
              <th>Ảnh chính bài viết*</th>
              <th>Ảnh phụ 1 bài viết*</th>
              <th>Ảnh phụ 2 bài viết*</th>
              <th>Baiviet_author</th>
             
              <th>Baiviet_category</th>
              <th>Hiển thị</th>

   

              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_posts as $key => $posts)
              <tr>
                <td>{{ $posts->id }}</td>
                <td>{{ $posts->Baiviet_title }}</td>
                <td>{{ $posts->Baiviet_slug }}</td>
                <td>{{ $posts->Baiviet_content }}</td>
                <td>{{ $posts->Baiviet_excerpt }}</td>
                <td><img src="uploads/posts/{{ $posts->Baiviet_image_main}}" alt="" height="100"width="150"></td>
                <td><img src="uploads/posts/{{ $posts->Baiviet_image_extra1}}" alt="" height="100"width="150"></td>
                <td><img src="uploads/posts/{{ $posts->Baiviet_image_extra2}}" alt="" height="100"width="150"></td>
                <td>{{ $posts->Baiviet_author }}</td>
                <td>{{ $posts->catgory_name }}</td>

                <td>
                  @if ($posts->Baiviet_status == 0)
                    <span class="badge badge-secondary">Ẩn</span>
                  @else
                    <span class="badge badge-success">Hiện</span>
                  @endif
                </td>
         
                <td>
                  <a href="{{ URL::to('/edit-baiviet/' . $posts->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-baiviet/' . $posts->id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



