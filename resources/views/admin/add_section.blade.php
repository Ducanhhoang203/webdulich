@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý Section <small>Thêm</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
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
                        @if(Session::has('error'))
                            <span class="text-danger">{{ Session::get('error') }}</span>
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

                    <form role="form" action="{{ URL::to('save-section') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tiêu đề <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="description" class="form-control" required value="{{ old('description') }}">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số năm <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="number" name="experience_years" class="form-control" required value="{{ old('experience_years') }}">
                                @error('experience_years')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số người tham gia <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="number" name="popular_destinations" class="form-control" required value="{{ old('popular_destinations') }}">
                                @error('popular_destinations')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số người theo học <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="number" name="satisfied_clients" class="form-control" required value="{{ old('satisfied_clients') }}">
                                @error('satisfied_clients')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Ảnh chính <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" name="image_main" class="form-control" required>
                                @error('image_main')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Ảnh bảo quanh</label>
                            <div class="col-md-6 col-sm-6" id="shapes-wrapper">
                                @for ($i = 0; $i < 7; $i++)
                                    <input type="file" name="shapes[]" class="form-control mb-2" accept="image/*" placeholder="Shape {{ $i+1 }}">
                                @endfor
                                @error('shapes.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" name="add_section">Thêm</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

