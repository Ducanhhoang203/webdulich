@include('layoutadmin') 

@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    {{-- Tiêu đề: Quản lý chương trình -> Quản lý thông tin Tour --}}
                    <h2>Quản lý Thông tin Tour <small>Thêm chi tiết</small></h2>
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
                        {{-- HIỂN THỊ THÔNG BÁO (Chuẩn hóa cú pháp Blade) --}}
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
                    {{-- HIỂN THỊ LỖI VALIDATION --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- FORM THÊM CHI TIẾT TOUR --}}
                    {{-- Action: save-chitietkhoahoc -> save-tour-detail (Giả định URL đã được đổi) --}}
                    <form role="form" action="{{ URL::to('save-chitietkhoahoc') }}" method="post" class="form-horizontal form-label-left">
                        @csrf

                        {{-- Tên Tiêu đề chi tiết (Ví dụ: Ngày 1: Tham quan Thủ đô) --}}
                        <div class="item form-group">
                            {{-- Tên chương trình -> Tiêu đề chi tiết --}}
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="curriculums_title">Tiêu đề Chi tiết Tour<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="curriculums_title" name="curriculums_title" placeholder="Ví dụ: Ngày 1: Tham quan di tích" required="required" class="form-control">
                            </div>
                        </div>

                        {{-- Nội dung Chi tiết Tour (Mô tả hành trình ngày đó) --}}
                        <div class="item form-group">
                            {{-- Nội dung chương trình -> Nội dung chi tiết Tour --}}
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="curriculums_content">Nội dung Chi tiết Tour <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea style="resize: vertical" rows="7" class="form-control" name="curriculums_content" placeholder="Mô tả chi tiết hoạt động, địa điểm tham quan, ăn uống trong phần này"></textarea>
                            </div>
                        </div>

                        {{-- Chọn Tour áp dụng --}}
                        <div class="item form-group">
                            {{-- Khóa đang học -> Tour áp dụng --}}
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="product">Tour áp dụng</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control chon" style="max-width:300px;" name="product">
                                    @foreach ($product as $pro)
                                        <option value="{{ $pro->product_id }}">{{ $pro->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                {{-- Thêm -> Thêm Chi tiết --}}
                                <button class="btn btn-primary" type="submit" name="add_chitietkhoahoc"><i class="fa fa-plus-circle"></i> Thêm Chi tiết</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

