<style>
 
</style>

@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
	
	<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Quản lý <small>Thêm Học viên</small></h2>
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
									
<form role="form" action="{{ URL::to('save-hocvien') }}" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

    @csrf
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">alt_text<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="alt_text" required="required" class="form-control">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hình ảnh học viên<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="last-name" name="image_path" required="required" class="form-control">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="summit" name="add_hocvien">Thêm học viên</button>
											
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
</div>
