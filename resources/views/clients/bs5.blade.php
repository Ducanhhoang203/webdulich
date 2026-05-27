<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Chỉnh Sửa Thông tin người dùng </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #f2f6fc;
            color: #69707a;
        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-xl px-4 mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <!-- Cột trái -->
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">Ảnh đại diện</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" 
                             src="{{ $user->avatar ?? asset('images/default-avatar.png') }}" 
                             alt="Avatar" width="150" height="150">

                 <form method="POST" action="{{ route('profile.updateAvatar') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="avatar" class="form-control mb-2">
                        <button class="btn btn-primary" type="submit">Tải ảnh mới</button>
                    </form>

                    </div>
                </div>

                <div class="card mb-4 mt-3">
                    <div class="card-header bg-secondary text-white">Đổi mật khẩu</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.password') }}">
                            @csrf
                            <div class="mb-3">
                                <label>Mật khẩu hiện tại</label>
                                <input type="password" name="current_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Mật khẩu mới</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Xác nhận mật khẩu mới</label>
                                <input type="password" name="new_password_confirmation" class="form-control">
                            </div>
                            <button class="btn btn-primary" type="submit">Đổi mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cột phải -->
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Thông tin tài khoản</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label>Tên hiển thị</label>
                                <input class="form-control" name="name" value="{{ old('name', $user->name) }}">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}">
                            </div>

                            <button class="btn btn-success" type="submit">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>