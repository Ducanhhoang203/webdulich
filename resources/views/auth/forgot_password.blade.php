<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu | TravelGo</title>
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

        .forgot-container {
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

        input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.3s;
            font-size: 15px;
        }

        input[type="email"]:focus {
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
    <div class="forgot-container">
        <h2>Quên mật khẩu?</h2>
        <p>Nhập email bạn đã đăng ký, chúng tôi sẽ gửi mã xác nhận để đổi mật khẩu.</p>

        <form action="{{ route('password.sendCode') }}" method="POST">
            @csrf
            <label>Email của bạn</label>
            <input type="email" name="email" required placeholder="abc@gmail.com">

            <button type="submit">Gửi mã xác nhận</button>
        </form>

        <a href="{{ route('login') }}" class="back-login">← Quay lại đăng nhập</a>
    </div>
</body>
</html>
