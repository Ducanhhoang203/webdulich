@include('layoutadmin')
@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý FAQs chi tiết <small>Thêm FAQs</small></h2>
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
                        @if(Session::has('message'))
                            <span class="text-alert">{{ Session::get('message') }}</span>
                            {{ Session::forget('message') }}
                        @endif
                    </div>
                </div>

                <div class="x_content">

                    {{-- Hiển thị lỗi validate --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ URL::to('save-faqs-chitiet') }}" method="post" class="form-horizontal form-label-left">
                        @csrf

                        {{-- Tiêu đề --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tiêu đề <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="faqs_chitiet_title" value="{{ old('faqs_chitiet_title') }}" required class="form-control">
                            </div>
                        </div>

                        {{-- Câu hỏi --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Câu hỏi <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="faqs_chitiet_cauhoi" value="{{ old('faqs_chitiet_cauhoi') }}" required class="form-control">
                            </div>
                        </div>

                        {{-- Câu trả lời --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Câu trả lời <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <textarea name="faqs_chitiet_cautraloi" rows="5" class="form-control">{{ old('faqs_chitiet_cautraloi') }}</textarea>
                            </div>
                        </div>

                        {{-- Danh mục sản phẩm --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">lớp học</label>
                            <div class="col-md-6 col-sm-6">
                                <select name="product_id" class="form-control">
                                    @foreach($product as $pro)
                                        <option value="{{ $pro->product_id }}" {{ old('product_id') == $pro->product_id ? 'selected' : '' }}>
                                            {{ $pro->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Hiển thị --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Hiển thị</label>
                            <div class="col-md-6 col-sm-6">
                                <select name="faqs_chitiet_status" class="form-control">
                                    <option value="0" {{ old('faqs_chitiet_status') == '0' ? 'selected' : '' }}>Ẩn</option>
                                    <option value="1" {{ old('faqs_chitiet_status') == '1' ? 'selected' : '' }}>Hiện</option>
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        {{-- Nút submit --}}
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit">Thêm</button>
                            </div>
                        </div>

                    </form>
                </div> <!-- x_content -->
            </div> <!-- x_panel -->
        </div>
    </div>
</div>


