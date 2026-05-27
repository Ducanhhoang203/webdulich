@include('layoutadmin')
@section('admin_content')

<div class="csslai">
    <h3>Cập Nhật Tours</h3>

    {{-- Hiển thị thông báo thành công --}}
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
            {{ Session::forget('message') }}
        </div>
    @endif

    {{-- Hiển thị lỗi validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ URL::to('/update-brand-product/' . $edit_value->brand_id) }}" method="POST" class="form-horizontal">
        @csrf

        {{-- Tên khóa học --}}
        <div class="form-group">
            <label for="brand_product_name">Tên :</label>
            <input type="text" class="form-control" name="brand_product_name"
                   value="{{ old('brand_product_name', $edit_value->brand_name) }}" required>
            @error('brand_product_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Mô tả --}}
        <div class="form-group">
            <label for="brand_product_desc">Mô tả Loại Hình Tour:</label>
            <textarea class="form-control" name="brand_product_desc" rows="3">{{ old('brand_product_desc', $edit_value->brand_desc) }}</textarea>
            @error('brand_product_desc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Trạng thái --}}
        <div class="form-group">
            <label for="brand_product_status">Trạng Thái:</label>
            <select name="brand_product_status" class="form-control chon">
                <option value="0" {{ old('brand_product_status', $edit_value->brand_status) == 0 ? 'selected' : '' }}>Ẩn</option>
                <option value="1" {{ old('brand_product_status', $edit_value->brand_status) == 1 ? 'selected' : '' }}>Hiện</option>
            </select>
            @error('brand_product_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Nút --}}
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ URL::to('all-brand-product') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>

