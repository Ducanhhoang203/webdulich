@include('layoutadmin')
@section('admin_content')
<div class="right_col canchinh" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý bài viết <small>Sửa bài viết</small></h2>
                    <div class="clearfix"><br /></div>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                        </div>
                    @endif
                </div>

                <div class="x_content">
                    <form action="{{ URL::to('upload-baiviet/'.$edit_value->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf

                        <!-- Title -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Tiêu đề bài viết<span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="Baiviet_title" class="form-control" required value="{{ $edit_value->Baiviet_title }}">
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Mở đầu </label>
                            <div class="col-md-6">
                                <input type="text" name="Baiviet_slug" class="form-control" value="{{ $edit_value->Baiviet_slug }}">
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Nội dung</label>
                            <div class="col-md-6">
                                <textarea name="Baiviet_content" rows="5" class="form-control">{{ $edit_value->Baiviet_content }}</textarea>
                            </div>
                        </div>

                        <!-- Excerpt -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Tóm tắt</label>
                            <div class="col-md-6">
                                <textarea name="Baiviet_excerpt" rows="3" class="form-control">{{ $edit_value->Baiviet_excerpt }}</textarea>
                            </div>
                        </div>

                        <!-- Main Image -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Ảnh chính</label>
                            <div class="col-md-6">
                                <input type="file" name="Baiviet_image_main" class="form-control">
                                @if($edit_value->Baiviet_image_main)
                                    <img src="{{ asset('uploads/posts/'.$edit_value->Baiviet_image_main) }}" width="100" height="100" />
                                @endif
                            </div>
                        </div>

                        <!-- Extra Image 1 -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Ảnh phụ 1</label>
                            <div class="col-md-6">
                                <input type="file" name="Baiviet_image_extra1" class="form-control">
                                @if($edit_value->Baiviet_image_extra1)
                                    <img src="{{ asset('uploads/posts/'.$edit_value->Baiviet_image_extra1) }}" width="100" height="100" />
                                @endif
                            </div>
                        </div>

                        <!-- Extra Image 2 -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Ảnh phụ 2</label>
                            <div class="col-md-6">
                                <input type="file" name="Baiviet_image_extra2" class="form-control">
                                @if($edit_value->Baiviet_image_extra2)
                                    <img src="{{ asset('uploads/posts/'.$edit_value->Baiviet_image_extra2) }}" width="100" height="100" />
                                @endif
                            </div>
                        </div>

                        <!-- Author -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Tên đơn vị</label>
                            <div class="col-md-6">
                                <input type="text" name="Baiviet_author" class="form-control" value="{{ $edit_value->Baiviet_author }}">
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Danh mục</label>
                            <div class="col-md-6">
                                <select name="Baiviet_category" class="form-control">
                                    @foreach ($cate_product as $cate)
                                        <option value="{{ $cate->catgory_id }}" {{ $cate->catgory_id == $edit_value->Baiviet_category ? 'selected' : '' }}>
                                            {{ $cate->catgory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="item form-group">
                            <label class="col-form-label col-md-3">Hiển thị</label>
                            <div class="col-md-6">
                                <select name="Baiviet_status" class="form-control">
                                    <option value="0" {{ $edit_value->Baiviet_status == 0 ? 'selected' : '' }}>Ẩn</option>
                                    <option value="1" {{ $edit_value->Baiviet_status == 1 ? 'selected' : '' }}>Hiện</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" name="edit_baiviet">Cập nhật bài viết</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- /x_content -->
            </div> <!-- /x_panel -->
        </div>
    </div>
</div>

