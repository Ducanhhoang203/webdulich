@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý Khóa Học<small>Thêm Khóa</small></h2>
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
                            <span class="text-success">{{ Session::get('message') }}</span>
                            {{ Session::forget('message') }}
                        @endif
                    </div>
                </div>

                <div class="x_content">
                    <form role="form" action="{{ URL::to('save-brand-product') }}" method="post" class="form-horizontal form-label-left">
                        @csrf

                        {{-- Tên khóa học --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên Khóa Học<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="brand_product_name" class="form-control" 
                                       value="{{ old('brand_product_name') }}">
                                @error('brand_product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Mô tả --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <textarea name="brand_product_desc" rows="5" class="form-control">{{ old('brand_product_desc') }}</textarea>
                                @error('brand_product_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Hiển thị --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Hiển thị</label>
                            <div class="col-md-6 col-sm-6">
                                <select name="brand_product_status" class="form-control chon">
                                    <option value="0" {{ old('brand_product_status') == '0' ? 'selected' : '' }}>Ẩn</option>
                                    <option value="1" {{ old('brand_product_status') == '1' ? 'selected' : '' }}>Hiện</option>
                                </select>
                                @error('brand_product_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" name="add_brand_product">Thêm Khóa</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- x_content -->
            </div> <!-- x_panel -->
        </div>
    </div>
</div>

