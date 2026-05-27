<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Đang Chờ Xử Lý</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset cơ bản */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .payment-card {
            background: #fff;
            padding: 50px 35px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            text-align: center;
            max-width: 450px;
            width: 90%;
            transition: all 0.4s ease;
        }

        .payment-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
        }

        .icon {
            font-size: 60px;
            margin-bottom: 20px;
            display: inline-block;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .payment-card h1 {
            font-size: 26px;
            color: #ff8c00;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .payment-card p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 30px;
        }

        .btn-office {
            display: inline-block;
            background: linear-gradient(135deg, #6a82fb, #fc5c7d);
            color: #fff;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-office:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            background: linear-gradient(135deg, #fc5c7d, #6a82fb);
        }

        .home-link {
            display: block;
            margin-top: 25px;
            font-size: 14px;
            color: #888;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .home-link:hover {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="payment-card">
        <span class="icon">⏳</span>

        <h1>Thanh Toán Đang Chờ Xử Lý</h1>
        <p>
            Đơn hàng của Quý khách đã được ghi nhận. 
            Vui lòng đến <strong>văn phòng</strong> của chúng tôi để hoàn tất quá trình thanh toán và nhận dịch vụ/sản phẩm.
        </p>

        <a href="#" class="btn-office" onclick="alert('Số nhà 3, ngõ 25, phố Vương Thừa Vũ, quận Thanh Xuân, Hà Nội'); return false;">
            Xem Địa Chỉ Văn Phòng
        </a>

        <a href="/" class="home-link">Quay về trang chủ</a>
    </div>
</body>
</html>
