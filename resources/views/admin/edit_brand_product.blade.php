
@include('layoutadmin')
@section('admin_content')

<div class="csslai">
    <h3>Cập nhật danh mục sản phẩm</h3>

    <form  action={{ URL::to('/update-brand-product/' . $edit_value->brand_id) }} method="POST">
        @csrf
        <div class="form-group">
            <label for="brand_product_name">Tên khóa học:</label>
            <input type="text" class="form-control" name="brand_product_name" value="{{ $edit_value->brand_name }}" required>
        </div>

        <div class="form-group">
            <label for="brand_product_desc">Mô tả khóa hoc:</label>
            <textarea class="form-control" name="brand_product_desc" rows="3">{{ $edit_value->brand_desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="brand_product_status">Trạng thái:</label>
            <select name="brand_product_status" class="form-control chon">
                <option value="0" {{ $edit_value->brand_status == 0 ? 'selected' : '' }}>Ẩn</option>
                <option value="1" {{ $edit_value->brand_status == 1 ? 'selected' : '' }}>Hiện</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ URL::to('all-brand-product') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>


