<style>
 
</style>

@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
	
	<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Quản lý footer <small>thêm </small></h2>
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
									
									<form role="form" action="{{ URL::to('save-footer') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
    @csrf
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Logo<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="last-name" name="logo_path" required="required" class="form-control">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Mô tả<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="5"  class="form-control" type="text" name="description_text"></textarea>
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">slogan_text<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea style="resize: none" rows="5"  class="form-control" type="text" name="slogan_text"></textarea>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="summit" name="add_footer">Thêm </button>
											
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
</div>
