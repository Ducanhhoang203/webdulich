<style>
  .canchinh {
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
              <th>Image Main</th>
              <th>Description</th>
              <th>Experience Years</th>
              <th>Popular Destinations</th>
              <th>Satisfied Clients</th>
              <th>Shapes</th>
              <th colspan="2">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($about_sections as $section)
              <tr>
                <td>{{ $section->id }}</td>
                <td>{{ $section->title }}</td>
                <td>
                  @if($section->image_main)
                    <img src="{{ asset('uploads/about/'.$section->image_main) }}" alt="Image Main" height="100" width="100">
                  @else
                    Không có ảnh
                  @endif
                </td>
                <td>{{ Str::limit($section->description, 100) }}</td>
                <td>{{ $section->experience_years }}</td>
                <td>{{ $section->popular_destinations }}</td>
                <td>{{ $section->satisfied_clients }}</td>
                <td>
                  @if($section->shapes)
                    @php
                      $shapes = json_decode($section->shapes, true);
                    @endphp
                    @foreach ($shapes as $shape)
                      <img src="{{ asset($shape) }}" alt="Shape Image" height="50" width="50" style="margin-right: 5px;">
                    @endforeach
                  @else
                    Không có shapes
                  @endif
                </td>
                <td>
                  <a href="{{ url('/admin/about_sections/edit/' . $section->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
                <td>
                  <form action="{{ url('/admin/about_sections/delete/' . $section->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

