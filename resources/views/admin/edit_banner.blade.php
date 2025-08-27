<style>
    .thumb-image {
        max-width: 200px;
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
                    <h2>Quản lý <small>Cập nhật Banner</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></a>
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

                    <form role="form" action="{{ URL::to('/update-banner/'.$edit_banner->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf

                        <!-- Tiêu đề Banner -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tiêu đề Banner<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="tile_baner" required="required" class="form-control" value="{{$edit_banner->tile_baner}}">
                            </div>
                        </div>

                        <!-- Hình ảnh Banner -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Hình ảnh Banner<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <!-- Hiển thị ảnh hiện tại -->
                                @if($edit_banner->image)
                                    <img src="{{ URL::to($edit_banner->image) }}" alt="Banner" class="thumb-image">
                                @endif
                                <input type="file" name="image" class="form-control">
                                <small class="text-muted">Chọn ảnh mới nếu muốn thay thế ảnh hiện tại</small>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit" name="edit_banner">Cập nhật Banner</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

