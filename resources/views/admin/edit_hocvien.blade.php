<style>
    .thumb-image {
        max-width: 150px;
        max-height: 150px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        padding: 5px;
    }
</style>

@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý <small>Cập nhật Học viên</small></h2>
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
                        <br />
                        @if (Session::has('message'))
                            <span class="text-alert">{{ Session::get('message') }}</span>
                            {{ Session::forget('message') }}
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

                    <form role="form" action="{{ URL::to('update-hocvien/'.$edit_gallery->id) }}" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf

                        <!-- Tên học viên -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Tên học viên<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="name" name="name" required="required" class="form-control" value="{{ $edit_gallery->name }}">
                            </div>
                        </div>

                        <!-- Tiểu sử học viên -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="bio">Tiểu sử học viên<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea id="bio" name="bio" required="required" class="form-control" rows="4">{{ $edit_gallery->bio }}</textarea>
                            </div>
                        </div>

                        <!-- Hình ảnh học viên -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="avatar">Hình ảnh học viên<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                @if($edit_gallery->avatar)
                                    <img src="{{ asset($edit_gallery->avatar) }}" alt="{{ $edit_gallery->name }}" class="thumb-image">
                                @endif
                                <input type="file" id="avatar" name="avatar" class="form-control">
                                <small class="text-muted">Chọn ảnh mới nếu muốn thay thế ảnh hiện tại</small>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit" name="edit_hocvien">Cập Nhật</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

