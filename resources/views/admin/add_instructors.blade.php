@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý  <small>Thêm Hướng Dẫn Viên</small></h2>
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
                        @if ($message = Session::get('message'))
                            <span class="text-alert">{{ $message }}</span>
                            {{ Session::put('message', null) }}
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

                    <form role="form" action="{{ URL::to('save-instructors') }}" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="instructors_name">Tên Hướng Dẫn Viên  <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="instructors_name" name="instructors_name" required class="form-control" value="{{ old('instructors_name') }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="instructors_bio">Tiểu Sử Hướng Dẫn Viên <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="instructors_bio" name="instructors_bio" required class="form-control" value="{{ old('instructors_bio') }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="instructors_image">Hình ảnh Hướng Dẫn Viên</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" id="instructors_image" name="instructors_image" class="form-control">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_cate">Tour Đang Hướng Dẫn Viên <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control chon" name="product_cate" style="max-width: 300px;">
                                    @foreach ($product as $pro)
                                        <option value="{{ $pro->product_id }}" {{ old('product_cate') == $pro->product_id ? 'selected' : '' }}>{{ $pro->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" name="add_instructors">Thêm </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- x_content -->
            </div> <!-- x_panel -->
        </div> <!-- col -->
    </div> <!-- row -->
</div> <!-- right_col -->

