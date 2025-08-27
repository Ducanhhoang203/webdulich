@include('layoutadmin')
@section('admin_content')

<div class="csslai">
    <h3>Cập nhật danh mục sản phẩm</h3>

    {{-- Hiển thị thông báo lỗi chung --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ URL::to('/update-cartegory-product/' . $edit_value->catgory_id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="cartegory_product_name">Tên danh mục <span class="required">*</span></label>
            <input type="text" class="form-control @error('cartegory_product_name') is-invalid @enderror" 
                   name="cartegory_product_name" 
                   value="{{ old('cartegory_product_name', $edit_value->catgory_name) }}" required>
            @error('cartegory_product_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cartegory_product_desc">Mô tả danh mục <span class="required">*</span></label>
            <textarea class="form-control @error('cartegory_product_desc') is-invalid @enderror" 
                      name="cartegory_product_desc" rows="3" required>{{ old('cartegory_product_desc', $edit_value->catgory_desc) }}</textarea>
            @error('cartegory_product_desc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_product_status">Trạng thái <span class="required">*</span></label>
            <select name="category_product_status" class="form-control chon @error('category_product_status') is-invalid @enderror" required>
                <option value="">--Chọn trạng thái--</option>
                <option value="0" {{ old('category_product_status', $edit_value->catgory_status) == 0 ? 'selected' : '' }}>Ẩn</option>
                <option value="1" {{ old('category_product_status', $edit_value->catgory_status) == 1 ? 'selected' : '' }}>Hiện</option>
            </select>
            @error('category_product_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ URL::to('all-cartegory-product') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>


