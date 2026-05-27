@include('layoutadmin')

@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm Admin Mới</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Settings 1</a></li>
                                <li><a class="dropdown-item" href="#">Settings 2</a></li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix">
                        <br />
                        @if(session('message'))
                            <span class="text-alert">{{ session('message') }}</span>
                        @endif
                    </div>
                </div>
                <div class="x_content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form role="form" action="{{ route('store_admin') }}" method="POST" class="form-horizontal form-label-left">
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="email" name="admin_email" required="required" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên Admin <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="admin_name" required="required" class="form-control" placeholder="Tên admin">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số điện thoại</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="admin_phone" class="form-control" placeholder="Số điện thoại">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mật khẩu <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" name="admin_password" required="required" class="form-control" placeholder="Mật khẩu">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Cấp độ <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="admin_level" required class="form-control">
                                    <option value="1">Quản lý</option>
                                    <option value="0">Super Admin</option>
                                    <option value="2">Nhân viên</option>

                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit" name="add_admin">Thêm Admin</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

