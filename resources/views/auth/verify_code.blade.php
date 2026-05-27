<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận mã | TravelGo</title>
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

        .verify-container {
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

        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.3s;
            font-size: 15px;
            text-align: center;
            letter-spacing: 3px;
            font-weight: 600;
        }

        input[type="text"]:focus {
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

        .back-forgot {
            display: block;
            margin-top: 20px;
            color: #007b7f;
            text-decoration: none;
            font-weight: 500;
        }

        .back-forgot:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="verify-container">
        <h2>Xác nhận mã</h2>
        <p>Nhập mã 6 chữ số đã được gửi tới email của bạn để tiếp tục đặt lại mật khẩu.</p>

        <form action="{{ route('password.verifyCode') }}" method="POST">
            @csrf
            <input type="text" name="code" placeholder="Nhập mã xác nhận" maxlength="6" required>

            <button type="submit">Xác nhận</button>
        </form>

        <a href="{{ route('password.forgot') }}" class="back-forgot">← Gửi lại mã xác nhận</a>
    </div>
</body>
</html>
