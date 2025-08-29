@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm Menu<small>mới</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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

                    <form role="form" action="{{ route('menus.store') }}" method="post" class="form-horizontal form-label-left">
                        @csrf

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên Menu <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="title" required="required" class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">URL</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="url" class="form-control" value="{{ old('url') }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Menu cha</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="parent_id">
                                    <option value="">-- Chọn menu cha --</option>
                                    @foreach($menus as $m)
                                        <option value="{{ $m->id }}" @if(old('parent_id') == $m->id) selected @endif>{{ $m->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Thứ tự</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="status">
                                    <option value="1" @if(old('status')==1) selected @endif>Hiển thị</option>
                                    <option value="0" @if(old('status')==0) selected @endif>Ẩn</option>
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-success" type="submit">Thêm </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

