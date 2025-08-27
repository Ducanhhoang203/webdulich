@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý chương trình <small>Cập nhật chương trình</small></h2>
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

                    <form role="form" action="{{ URL::to('update-chitietkhoahoc/'.$edit_value->curriculums_id) }}" method="post" class="form-horizontal form-label-left">
                        @csrf

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="curriculums_title">Tên chương trình<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="curriculums_title" name="curriculums_title" required="required" class="form-control" value="{{ $edit_value->curriculums_title }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="curriculums_content">Nội dung chương trình *</label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea style="resize: none" rows="5" class="form-control" name="curriculums_content">{{ $edit_value->curriculums_content }}</textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="product">Khóa đang học</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control chon" style="max-width:200px;" name="product">
                                    @foreach ($product as $pro)
                                        <option value="{{ $pro->product_id }}" {{ $edit_value->product_id == $pro->product_id ? 'selected' : '' }}>{{ $pro->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit">Cập nhật chương trình</button>
                                <a href="{{ URL::to('all-chitietkhoahoc') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
