@include('layoutadmin') 

@section('admin_content')

<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                
                {{-- KHỐI TIÊU ĐỀ --}}
                <div class="x_title">
                    {{-- Tiêu đề: Quản lý Tour -> Quản lý Loại Hình Tour --}}
                    <h2>Quản lý Loại Hình Tour <small>Thêm mới</small></h2>
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
                        {{-- HIỂN THỊ THÔNG BÁO --}}
                        @if(Session::has('message'))
                            <span class="text-success" style="font-weight: bold;">{{ Session::get('message') }}</span>
                            @php
                                Session::forget('message');
                            @endphp
                        @endif
                    </div>
                </div>

                {{-- KHỐI NỘI DUNG FORM --}}
                <div class="x_content">
                    {{-- Giữ nguyên action và method, vì chúng quản lý một loại danh mục sản phẩm (brand/category) --}}
                    <form role="form" action="{{ URL::to('save-brand-product') }}" method="post" class="form-horizontal form-label-left">
                        @csrf

                        {{-- Tên Loại Hình Tour --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên Loại Hình Tour <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="brand_product_name" class="form-control" placeholder="Ví dụ: Tour Khám phá, Tour Nghỉ dưỡng, Tour Văn hóa..."
                                        value="{{ old('brand_product_name') }}" required>
                                @error('brand_product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Mô tả --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả Loại Hình <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <textarea name="brand_product_desc" rows="5" class="form-control" placeholder="Mô tả về loại hình tour này">{{ old('brand_product_desc') }}</textarea>
                                @error('brand_product_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Trạng thái hiển thị --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái hiển thị</label>
                            <div class="col-md-6 col-sm-6">
                                <select name="brand_product_status" class="form-control chon">
                                    <option value="0" {{ old('brand_product_status') == '0' ? 'selected' : '' }}>Tạm ẩn</option> 
                                    <option value="1" {{ old('brand_product_status') == '1' ? 'selected' : '' }}>Hiển thị</option> 
                                </select>
                                @error('brand_product_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" name="add_brand_product">Thêm Loại Hình Tour</button> 
                            </div>
                        </div>
                    </form>
                </div> </div> </div>
    </div>
</div>

