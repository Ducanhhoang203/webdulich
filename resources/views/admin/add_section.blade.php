@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
	
	<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Quản lý section <small> Thêm  </small></h2>
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

									<form role="form" action="{{ URL::to('save-section') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
    @csrf
                                                                               <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">title<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="title" required="required" class="form-control">
											</div>
										</div>
                                                                          <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">description<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="description" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">experience_years</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="experience_years" required="required" class="form-control">
											</div>
										</div>
                                         <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">popular_destinations<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="popular_destinations" required="required" class="form-control">
											</div>
										</div>		
                                         <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">satisfied_clients<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="satisfied_clients" required="required" class="form-control">
											</div>
										</div>
                                        
                                         <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">image_main<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="last-name" name="image_main" required="required" class="form-control">
											</div>
										</div>
                                           <div class="item form-group">
    <label for="shapes" class="col-form-label col-md-3 col-sm-3 label-align">Shapes</label>
   <div class="col-md-6 col-sm-6 ">
    <input type="file" name="shapes[]" class="form-control mb-2" placeholder="Shape 1" accept="image/*">
    <input type="file" name="shapes[]" class="form-control mb-2" placeholder="Shape 2" accept="image/*">
    <input type="file" name="shapes[]" class="form-control mb-2" placeholder="Shape 3" accept="image/*">
    <input type="file" name="shapes[]" class="form-control mb-2" placeholder="Shape 4" accept="image/*">
    <input type="file" name="shapes[]" class="form-control mb-2" placeholder="Shape 5" accept="image/*">
    <input type="file" name="shapes[]" class="form-control mb-2" placeholder="Shape 6" accept="image/*">
    <input type="file" name="shapes[]" class="form-control mb-2" placeholder="Shape 7" accept="image/*">
</div>

</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="summit" name="add_section">Thêm</button>
											
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
				</div>
</div>
<script>
document.getElementById('add-shape-btn').addEventListener('click', function(){
    const wrapper = document.getElementById('shapes-wrapper');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'shapes[]';
    input.className = 'form-control mb-2';
    input.placeholder = 'Shape mới';
    wrapper.appendChild(input);
});
