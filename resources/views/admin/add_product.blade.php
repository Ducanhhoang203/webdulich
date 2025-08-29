@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý Khóa Học <small>Thêm Môn Học</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu">
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
                            {{ Session::put('message', null) }}
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

                    <form role="form" action="{{ URL::to('save-product') }}" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên Môn Học<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="product_name" required class="form-control" value="{{ old('product_name') }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Giá Môn Học<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="product_price" required class="form-control" value="{{ old('product_price') }}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Hình ảnh Môn Học</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" name="product_image" class="form-control" accept="image/*" onchange="previewImage(event)">
                                <br>
                                <img id="preview_img" src="" style="display:none;" width="150">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả Môn Học</label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea style="resize:none" rows="5" class="form-control" name="product_desc">{{ old('product_desc') }}</textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nội dung Môn Học</label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea style="resize:none" rows="5" class="form-control" name="product_content">{{ old('product_content') }}</textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Danh mục</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control chon" name="product_cate">
                                    @foreach ($cate_product as $cate)
                                        <option value="{{ $cate->catgory_id }}">{{ $cate->catgory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Khóa Học</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control chon" name="product_brand">
                                    @foreach ($brand_product as $brand)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Hiển thị</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control chon" name="product_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1" selected>Hiện</option>
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit" name="add_product">Thêm </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview_img');
    if(input.files && input.files[0]){
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
            preview.style.display = 'inline-block';
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>

