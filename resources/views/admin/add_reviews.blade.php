@include('layoutadmin')
@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý Reviews <small>Thêm Review</small></h2>
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

                    <form action="{{ URL::to('save-reviews') }}" method="post" class="form-horizontal form-label-left">
                        @csrf

                        {{-- Tên người review --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên người review <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="review_name" class="form-control" required placeholder="Nhập tên người review">
                            </div>
                        </div>

                        {{-- Số sao đánh giá --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Đánh giá (1 đến 5 sao) <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="number" name="review_star" class="form-control" min="1" max="5" required placeholder="Nhập số sao từ 1 đến 5">
                            </div>
                        </div>

                        {{-- Nội dung review --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nội dung review</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea name="reviews_content" rows="5" class="form-control" placeholder="Nhập nội dung review"></textarea>
                            </div>
                        </div>

                        {{-- Chọn khóa học / sản phẩm --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Loại Hình Tour</label>
                            <div class="col-md-6 col-sm-6">
                                <select name="product_id" class="form-control">
                                    @foreach ($product as $pro)
                                        <option value="{{ $pro->product_id }}">{{ $pro->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Hiển thị --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Hiển thị</label>
                            <div class="col-md-6 col-sm-6">
                                <select name="reviews_start" class="form-control">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        {{-- Nút submit --}}
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-success" type="submit">Thêm </button>
                            </div>
                        </div>

                    </form>
                </div> <!-- x_content -->
            </div> <!-- x_panel -->
        </div>
    </div>
</div>


