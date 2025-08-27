@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý <small>Sửa giáo viên</small></h2>
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
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message', null);
                            }
                        ?>
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

                   <form action="{{ URL::to('update-instructors/'.$edit_value->instructors_id) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                      @csrf

                        <!-- Tên giáo viên -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên giáo viên <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="instructors_name" required="required" class="form-control" value="{{ $edit_value->instructors_name }}">
                            </div>
                        </div>

                        <!-- Tiểu sử giáo viên -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tiểu sử giáo viên <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="instructors_bio" required="required" class="form-control" value="{{ $edit_value->instructors_bio }}">
                            </div>
                        </div>

                        <!-- Ảnh giáo viên -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Hình ảnh giáo viên</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" name="instructors_image" class="form-control">
                                @if($edit_value->instructors_image)
                                    <img src="{{ asset('uploads/instructors/'.$edit_value->instructors_image) }}" alt="Ảnh giáo viên" style="width:150px; margin-top:10px;">
                                @endif
                                <p class="text-info">Nếu muốn giữ ảnh cũ, không chọn file mới.</p>
                            </div>
                        </div>

                        <!-- Khóa học -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Khóa đang học <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="product_cate" required>
                                    @foreach ($product as $pro)
                                        <option value="{{ $pro->product_id }}" {{ $pro->product_id == $edit_value->product_id ? 'selected' : '' }}>
                                            {{ $pro->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-success" type="submit">Cập nhật giáo viên</button>
                                <a href="{{ URL::to('all-instructors') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

