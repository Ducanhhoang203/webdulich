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
              <th>Review name </th>
             <th>Số lượng sao </th>
              <th>Nội dung </th>
              <th>Trạng thái</th>
              <th>Khóa Dạy</th>
              

   

              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_reviews as $key => $review)
              <tr>
                <td>{{ $review->reviews_id }}</td>
                <td>{{ $review->review_name }}</td>
                <td>{{ $review->review_star }}</td>
                <td>{{ $review->reviews_content}}</td>
                  <td>
                  @if ($review->reviews_start == 0)
                    <span class="badge badge-secondary">Ẩn</span>
                  @else
                    <span class="badge badge-success">Hiện</span>
                  @endif
                </td>
             
                <td>{{ $review->product_name }}</td>
                

                <td>
                  <a href="{{ URL::to('/edit-reviews/' . $review->reviews_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-reviews/' . $review->reviews_id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



