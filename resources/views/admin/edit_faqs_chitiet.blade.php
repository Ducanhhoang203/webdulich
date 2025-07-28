<style>
 
</style>

@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
	
	<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>cập nhật faqs<small>sửa faqs</small></h2>
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
									
									<form role="form" action="{{ URL::to('update-faqs-chitiet/'.$edit_value->faqs_chitiet_id) }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
    @csrf
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Title<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="faqs_chitiet_title" required="required" class="form-control" value="{{$edit_value->faqs_chitiet_title }}">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Câu hỏi<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="faqs_chitiet_cauhoi" required="required" class="form-control" value="{{ $edit_value->faqs_chitiet_cauhoi }}">
											</div>
										</div>
                                       
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Câu trả lời </label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="5"  class="form-control" type="text" name="faqs_chitiet_cautraloi" >{{ $edit_value->faqs_chitiet_cautraloi }}</textarea>
											</div>
										</div>
                                     
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Danh mục </label>
											<div class="col-md-9 col-sm-9 ">
											
												<select class="form-control chon" style="max-with:200px;" name="product_id">
													@foreach ($product as $key=> $pro)
                                                       <option value="{{ $pro->product_id}}">{{ $pro->product_name}}</option>  
                                                    @endforeach
												</select>
											</div>
										</div>
                                        
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hiển thị</label>
											<div class="col-md-9 col-sm-9 ">
											
												<select class="form-control chon" style="max-with:200px;" name="faqs_chitiet_status">
																						
                                <option value="0" {{ $edit_value->faqs_chitiet_status == 0 ? 'selected' : '' }}>Ẩn</option>
                                <option value="1" {{ $edit_value->faqs_chitiet_status == 1 ? 'selected' : '' }}>Hiện</option>
													
												</select>
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="summit" name="edit_faqs_chitiet">cập nhật câu hỏi</button>
											
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
</div>
