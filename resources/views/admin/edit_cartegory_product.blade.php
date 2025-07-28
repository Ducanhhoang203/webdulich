
@include('layoutadmin')
@section('admin_content')

<div class="csslai">
    <h3>Cập nhật danh mục sản phẩm</h3>

    <form  action={{ URL::to('/update-cartegory-product/' . $edit_value->catgory_id) }} method="POST">
        @csrf
        <div class="form-group">
            <label for="cartegory_product_name">Tên danh mục:</label>
            <input type="text" class="form-control" name="cartegory_product_name" value="{{ $edit_value->catgory_name }}" required>
        </div>

        <div class="form-group">
            <label for="cartegory_product_desc">Mô tả danh mục:</label>
            <textarea class="form-control" name="cartegory_product_desc" rows="3">{{ $edit_value->catgory_desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_product_status">Trạng thái:</label>
            <select name="category_product_status" class="form-control chon">
                <option value="0" {{ $edit_value->catgory_status == 0? 'selected' : '' }}>Ẩn </option>
                <option value="1" {{ $edit_value->catgory_status == 1 ? 'selected' : '' }}>Hiện</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ URL::to('all-cartegory-product') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>


