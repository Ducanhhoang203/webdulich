<style>
 
</style>

@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
	
	<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Quản lý Khóa Học<small>Thêm Khóa Học</small></h2>
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
									
										
									
								<form role="form" action="{{ URL::to('update-product/'.$edit_value->product_id) }}" method="post" enctype="multipart/form-data">

    @csrf
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tên Môn Học<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="product_name" required="required" class="form-control" value="{{ $edit_value->product_name }}">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Giá môn Học<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" value="{{ $edit_value ->product_price }}" name="product_price" required="required" class="form-control">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hình ảnh môn Học<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="last-name" name="product_image" required="required" class="form-control">
												<img src="{{ URL::To('uploads/product/'.$edit_value->product_image) }}" alt="" height="100" width="100">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mô tả Môn học</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="5"  class="form-control" type="text" name="product_desc" >{{ $edit_value->product_desc }}></textarea>
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nội dung môn học </label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="5"  class="form-control" type="text" name="product_content" >{{ $edit_value ->product_content }}</textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Danh mục </label>
											<div class="col-md-9 col-sm-9 ">
											
												<select class="form-control chon" style="max-with:200px;" name="product_cate">
													
                                                   
														  @foreach ($cate_product as $key =>$cate)
                                                <option value="{{ $cate->catgory_id }}">{{ $cate->catgory_name }}</option>
                                                @endforeach
													 
												</select>
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Khóa Học</label>
											<div class="col-md-9 col-sm-9 ">
											
												<select class="form-control chon" style="max-with:200px;" name="product_brand">
												@foreach ($brand_product as $key =>$brand)
                                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                                @endforeach
											
													
												</select>
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hiển thị</label>
											<div class="col-md-9 col-sm-9 ">
											
												<select class="form-control chon" style="max-with:200px;" name="product_status">
													
                <option value="0" {{ $edit_value->product_status == 0 ? 'selected' : '' }}>Ẩn</option>
                <option value="1" {{ $edit_value->product_status == 1 ? 'selected' : '' }}>Hiện</option>
            </select>
													
											
											</div>
										</div>
										{{-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div> --}}
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="summit" name="edit_product">Cập nhật môn học</button>
											
											</div>
										</div>

									</form>
								
								</div>
							</div>
						</div>
					</div>
</div>
