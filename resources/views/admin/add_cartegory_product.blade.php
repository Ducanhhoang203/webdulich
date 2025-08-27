<style>
 
</style>

@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
	
	<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Danh mục<small>Thêm danh mục</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									
											{{-- $message = Session::get('message');
											if($message){
												echo '<span class="text-alert">'.$message.'</span>';
												Session::put('message', null);
											} --}}
								
							@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form role="form" action="{{ URL::to('save-cartegory-product') }}" method="post" data-parsley-validate class="form-horizontal form-label-left">
    @csrf

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Tên danh mục <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="cartegory_product_name" class="form-control" value="{{ old('cartegory_product_name') }}">
            @error('cartegory_product_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <textarea name="cartegory_product_desc" rows="5" class="form-control" style="resize: none">{{ old('cartegory_product_desc') }}</textarea>
            @error('cartegory_product_desc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Hiển thị <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <select class="form-control chon" name="cartegory_product_status">
                <option value="">--Chọn trạng thái--</option>
                <option value="0" {{ old('cartegory_product_status') == '0' ? 'selected' : '' }}>Ẩn</option>
                <option value="1" {{ old('cartegory_product_status') == '1' ? 'selected' : '' }}>Hiện</option>
            </select>
            @error('cartegory_product_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button class="btn btn-primary" type="submit">Thêm danh mục</button>
        </div>
    </div>
</form>


								</div>
							</div>
						</div>
					</div>
</div>
