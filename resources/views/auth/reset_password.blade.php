<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu | TravelGo</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #3ec1d3, #f6f7d7, #ff9a76);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .reset-container {
            background: #fff;
            width: 400px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            padding: 30px 40px;
            text-align: center;
            animation: fadeIn 0.8s ease;
        }

        h2 {
            color: #007b7f;
            margin-bottom: 10px;
            font-weight: 600;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            color: #444;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.3s;
            font-size: 15px;
        }

        input[type="password"]:focus {
            border-color: #3ec1d3;
        }

        button {
            width: 100%;
            background: #3ec1d3;
            border: none;
            color: white;
            padding: 12px 0;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
        }

        button:hover {
            background: #35a7b0;
        }

        .back-login {
            display: block;
            margin-top: 20px;
            color: #007b7f;
            text-decoration: none;
            font-weight: 500;
        }

        .back-login:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h2>Đặt lại mật khẩu</h2>
       
<form action="{{ route('password.reset') }}" method="POST">
    @csrf

    <label>Mật khẩu mới</label>
    <input type="password" name="password" placeholder="Nhập mật khẩu mới" required>
  

    <label>Xác nhận mật khẩu</label>
    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
     @error('password')
        <div style="color: red; font-size: 14px; margin-top: 5px;">
            {{ $message }}
        </div>
    @enderror

    <!-- Hiển thị thông báo success hoặc error từ session -->
    @if (session('success'))
        <div style="color: green; font-size: 14px; margin-top: 10px;">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div style="color: red; font-size: 14px; margin-top: 10px;">
            {{ session('error') }}
        </div>
    @endif

    <button type="submit">Cập nhật mật khẩu</button>
</form>

        <a href="{{ route('dangnhap') }}" class="back-login">← Quay lại đăng nhập</a>
    </div>
</body>
</html>
