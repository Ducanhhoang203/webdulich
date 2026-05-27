<style>
/* CSS hiện tại của bạn */
</style>

{{-- Sử dụng @extends thay vì @include nếu 'layoutadmin' là layout chính --}}
@include('layoutadmin') 

@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    {{-- Tiêu đề trang --}}
                    <h2>Quản lý Bài viết <small>Thêm bài viết mới</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Cài đặt 1</a></li> {{-- Settings 1 -> Cài đặt 1 --}}
                                <li><a class="dropdown-item" href="#">Cài đặt 2</a></li> {{-- Settings 2 -> Cài đặt 2 --}}
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix">
                        <br />
                        {{-- Hiển thị thông báo (Laravel Session) --}}
                        @php
                            $message = Session::get('message');
                        @endphp
                        @if ($message)
                            {{-- Sử dụng cú pháp Blade và CSS phù hợp hơn --}}
                            <span class="text-alert" style="color: green; font-weight: bold;">{{ $message }}</span>
                            @php
                                Session::put('message', null);
                            @endphp
                        @endif
                    </div>
                </div>
                <div class="x_content">
                    {{-- Hiển thị lỗi Validation --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    {{-- Script CKEDITOR (Giữ nguyên) --}}
                    <script>
                        function updateEditor() {
                            for (instance in CKEDITOR.instances) {
                                CKEDITOR.instances[instance].updateElement();
                            }
                            return true;
                        }
                    </script>

                    {{-- FORM THÊM BÀI VIẾT --}}
                    <form role="form" action="{{ URL::to('save-baiviet') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Tiêu đề bài viết (Baiviet_title) --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Baiviet_title">Tiêu đề bài viết <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                {{-- Giữ nguyên tên id/name nhưng đổi placeholder hoặc nhãn --}}
                                <input type="text" id="Baiviet_title" name="Baiviet_title" required="required" class="form-control" >
                            </div>
                        </div>
                        
                        {{-- Đường dẫn rút gọn (Baiviet_slug) --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Baiviet_slug">Đường dẫn (Slug) <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                {{-- "Mở đầu bài viết" thường là Slug/URL rút gọn --}}
                                <input type="text" id="Baiviet_slug" name="Baiviet_slug" required="required" class="form-control">
                            </div>
                        </div>
                        
                        {{-- Nội dung bài viết (Baiviet_content) --}}
                        <div class="item form-group">
                            <label for="Baiviet_content" class="col-form-label col-md-3 col-sm-3 label-align">Nội dung chi tiết</label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea style="resize: none" rows="5" class="form-control" name="Baiviet_content"></textarea>
                            </div>
                        </div>
                        
                        {{-- Trích dẫn bài viết (Baiviet_excerpt) --}}
                        <div class="item form-group">
                            <label for="Baiviet_excerpt" class="col-form-label col-md-3 col-sm-3 label-align">Mô tả tóm tắt (Trích dẫn)</label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea style="resize: none" rows="5" class="form-control" name="Baiviet_excerpt"></textarea>
                            </div>
                        </div>
                        
                        {{-- Ảnh đại diện (Baiviet_image_main) --}}
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Baiviet_image_main">Ảnh đại diện (Chính) <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" id="Baiviet_image_main" name="Baiviet_image_main" required="required" class="form-control">
                            </div>
                        </div>
                        
                        {{-- Ảnh phụ 1 (Baiviet_image_extra1) --}}
                        <div class="item form-group">
                            {{-- Đã sửa nhãn: Ảnh phụ 2 bài viết* -> Ảnh phụ 1 --}}
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Baiviet_image_extra1">Ảnh minh họa phụ 1 <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" id="Baiviet_image_extra1" name="Baiviet_image_extra1" required="required" class="form-control">
                            </div>
                        </div>
                        
                        {{-- Ảnh phụ 2 (Baiviet_image_extra2) --}}
                        <div class="item form-group">
                            {{-- Đã sửa nhãn: Baiviet_image_extra2 -> Ảnh phụ 2 --}}
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Baiviet_image_extra2">Ảnh minh họa phụ 2 <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" id="Baiviet_image_extra2" name="Baiviet_image_extra2" required="required" class="form-control">
                            </div>
                        </div>
                        
                        {{-- Tác giả (Baiviet_author) --}}
                        <div class="item form-group">
                            <label for="Baiviet_author" class="col-form-label col-md-3 col-sm-3 label-align">Tác giả</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="Baiviet_author" name="Baiviet_author" required="required" class="form-control">
                            </div>
                        </div>
                        
                        {{-- Chuyên mục (Baiviet_category) --}}
                        <div class="item form-group">
                            <label for="Baiviet_category" class="col-form-label col-md-3 col-sm-3 label-align">Chuyên mục</label>
                            <div class="col-md-6 col-sm-6 "> {{-- Đã sửa col-md-9 thành col-md-6 để căn chỉnh đẹp hơn --}}
                                <select class="form-control chon" name="Baiviet_category">
                                    @foreach ($cate_product as $key => $cate)
                                        <option value="{{ $cate->catgory_id }}">{{ $cate->catgory_name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        {{-- Trạng thái hiển thị (Baiviet_status) --}}
                        <div class="item form-group">
                            <label for="Baiviet_status" class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái hiển thị</label>
                            <div class="col-md-6 col-sm-6 "> {{-- Đã sửa col-md-9 thành col-md-6 --}}
                                <select class="form-control chon" name="Baiviet_status">
                                    <option value="0">Tạm ẩn</option> {{-- Ẩn -> Tạm ẩn --}}
                                    <option value="1">Hiển thị</option> {{-- Hiện -> Hiển thị --}}
                                </select>
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="submit" name="add_baiviet">Thêm bài viết</button> {{-- type="summit" -> type="submit" --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
