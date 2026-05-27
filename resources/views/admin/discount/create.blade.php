{{-- resources/views/admin/discount/create.blade.php --}}

@include('layoutadmin')

@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý Mã Giảm Giá <small>Thêm mới</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Cài đặt 1</a></li>
                                <li><a class="dropdown-item" href="#">Cài đặt 2</a></li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix">
                        <br />
                        @php
                            $message = Session::get('message');
                        @endphp
                        @if ($message)
                            <span class="text-alert" style="color: green; font-weight: bold;">{{ $message }}</span>
                            @php
                                Session::put('message', null);
                            @endphp
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

                    {{-- FORM THÊM MÃ GIẢM GIÁ --}}
                    <form role="form" action="{{ route('discount.store') }}" method="POST" class="form-horizontal form-label-left">
                        @csrf

                        {{-- Mã giảm giá --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="code">Mã giảm giá <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="code" name="code" required="required" class="form-control" placeholder="Nhập mã giảm giá">
                            </div>
                        </div>

                        {{-- Phần trăm giảm --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="percent">Phần trăm giảm (%) <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="percent" name="percent" required="required" class="form-control" placeholder="Nhập phần trăm giảm" min="0" max="100">
                            </div>
                        </div>

                        {{-- Hạn sử dụng --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="expires_at">Hạn sử dụng</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" id="expire_date" name="expires_at" class="form-control">
                            </div>
                        </div>

                        {{-- Trạng thái --}}


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit">Thêm Mã Giảm Giá</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- x_content -->
            </div> <!-- x_panel -->
        </div>
    </div>
</div>

