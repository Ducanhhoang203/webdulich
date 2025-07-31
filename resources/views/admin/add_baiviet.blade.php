<style>
 
</style>

@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
	
	<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Quản lý bài viết <small>Thêm bài viết </small></h2>
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
									<script>
    function updateEditor() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        return true;
    }
</script>

									<form role="form" action="{{ URL::to('save-baiviet') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
    @csrf
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Baiviet_title<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="Baiviet_title" required="required" class="form-control" value="{{ $edit_value->Baiviet_title }}">
											</div>
										</div>
                                       
                                                                               <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Baiviet_slug <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="Baiviet_slug" required="required" class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Baiviet_content</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="5"  class="form-control" type="text" name="Baiviet_content"></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Baiviet_excerpt</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="5"  class="form-control" type="text" name="Baiviet_excerpt"></textarea>
											</div>
										</div>
                                         <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Baiviet_image_main<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="last-name" name="Baiviet_image_main" required="required" class="form-control">
											</div>
										</div>
                                         <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Baiviet_image_extra1<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="last-name" name="Baiviet_image_extra1" required="required" class="form-control">
											</div>
										</div>
                                         <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Baiviet_image_extra2<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="last-name" name="Baiviet_image_extra2" required="required" class="form-control">
											</div>
										</div>
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Baiviet_author</label>
											<div class="col-md-6 col-sm-6 ">
													<input type="text" id="last-name" name="Baiviet_author" required="required" class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Baiviet_category</label>
											<div class="col-md-9 col-sm-9 ">
											
												<select class="form-control chon" style="max-with:200px;" name="Baiviet_category">
													@foreach ($cate_product as $key=> $cate)
                                                       <option value="{{ $cate->catgory_id }}">{{ $cate->catgory_name }}</option>  
                                                    @endforeach
												</select>
											</div>
										</div>
										
                                       
                                        <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hiển thị</label>
											<div class="col-md-9 col-sm-9 ">
											
												<select class="form-control chon" style="max-with:200px;" name="Baiviet_status">
													<option value="0">Ẩn </option>
													<option value="1">Hiện</option>
													
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
												<button class="btn btn-primary" type="summit" name="add_baiviet">Thêm Môn học</button>
											
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
</div>
