@include('layoutadmin')
@section('admin_content')

<style>
    .right_col.canchinh {
        margin-left: 13%;
        padding: 20px;
    }
    .text-alert {
        color: red;
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>

<div class="right_col canchinh" role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sửa thông tin Admin</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <form action="{{ route('update_admin', $admin->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="admin_email" class="form-control" value="{{ $admin->admin_email }}" required>
                            </div>

                            <div class="form-group">
                                <label>Tên:</label>
                                <input type="text" name="admin_name" class="form-control" value="{{ $admin->admin_name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại:</label>
                                <input type="text" name="admin_phone" class="form-control" value="{{ $admin->admin_phone }}" required>
                            </div>

                            <div class="form-group">
                                <label>Cấp Admin:</label>
                                <select name="admin_level" class="form-control">
                                    <option value="0" {{ $admin->admin_level == 0 ? 'selected' : '' }}>Admin cấp cao</option>
                                    <option value="1" {{ $admin->admin_level == 1 ? 'selected' : '' }}>Quản lý</option>
                                    <option value="2" {{ $admin->admin_level == 2 ? 'selected' : '' }}>Nhân Viên</option>
                                </select>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            <a href="{{ route('all_admin') }}" class="btn btn-secondary">Quay lại</a>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

