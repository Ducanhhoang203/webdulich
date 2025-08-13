@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý section <small> Chỉnh sửa </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Settings 1</a></li>
                                <li><a class="dropdown-item" href="#">Settings 2</a></li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix">
                        @if(Session::has('success'))
                            <span class="text-success">{{ Session::get('success') }}</span>
                        @endif
                    </div>
                </div>
                <div class="x_content">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ url('/admin/about_sections/update/'.$section->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" data-parsley-validate>
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Title <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="title" required class="form-control" value="{{ old('title', $section->title) }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Description <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="description" required class="form-control" value="{{ old('description', $section->description) }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Experience Years</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="experience_years" required class="form-control" value="{{ old('experience_years', $section->experience_years) }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Popular Destinations <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="popular_destinations" required class="form-control" value="{{ old('popular_destinations', $section->popular_destinations) }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Satisfied Clients <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="satisfied_clients" required class="form-control" value="{{ old('satisfied_clients', $section->satisfied_clients) }}">
                            </div>
                        </div>

                        <!-- Ảnh chính -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Image Main <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" name="image_main" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_main')">
                                <br>
                                <img id="preview_main" src="{{ asset('uploads/about/'.$section->image_main) }}" alt="Image Main" width="150" style="display: inline-block;">
                            </div>
                        </div>

                        <!-- Shapes -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Shapes</label>
                            <div class="col-md-6 col-sm-6 ">
                                @for ($i = 0; $i < 7; $i++)
                                    <input type="file" name="shapes[]" class="form-control mb-2" accept="image/*" onchange="previewImage(event, 'preview_shape_{{$i}}')">
                                    <img
                                        id="preview_shape_{{$i}}"
                                        src="{{ isset($shapes[$i]) ? asset($shapes[$i]) : '' }}"
                                        alt="Shape {{$i+1}}"
                                        width="100" height="100"
                                        style="display: {{ isset($shapes[$i]) ? 'inline-block' : 'none' }}; margin-bottom: 10px;"
                                    >
                                @endfor
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" name="edit_section">Cập nhật</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event, previewId) {
    const input = event.target;
    const preview = document.getElementById(previewId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'inline-block';
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "";
        preview.style.display = 'none';
    }
}
</script>

