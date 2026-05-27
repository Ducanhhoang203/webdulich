<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Thành Công</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Font Inter cho toàn trang */
        body {
            font-family: "Inter", sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #e0e7ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Hiệu ứng bounce cho icon */
        .success-icon {
            color: #10b981;
            font-size: 100px;
            animation: bounce 0.6s ease-out;
        }

        @keyframes bounce {
            0% { transform: scale(0.6); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); }
        }

        /* Gradient button animation */
        .btn-gradient {
            background: linear-gradient(90deg, #4f46e5, #3b82f6);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(90deg, #3b82f6, #4f46e5);
            transform: scale(1.03);
        }

        /* Card shadow và border mềm mại */
        .card {
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
            border-radius: 1rem;
        }

        /* Tooltip cho Mã giao dịch và Tổng tiền */
        .info-box p span {
            display: inline-block;
            margin-left: 0.25rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="card flex flex-col items-center justify-center p-10 md:p-12 bg-white max-w-md w-full text-center">
    
    <!-- Icon checkmark -->
    <svg class="success-icon mb-8 mx-auto" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
        <polyline points="22 4 12 14.01 9 11.01"/>
    </svg>

    <h1 class="text-4xl font-extrabold text-emerald-600 mb-4">Thanh Toán Thành Công!</h1>
    <p class="text-gray-700 mb-8 text-lg">Cảm ơn quý khách. Giao dịch của quý khách đã được xử lý thành công.</p>

    <!-- Thông tin giao dịch -->
    <div class="info-box w-full p-5 bg-emerald-50 rounded-xl border border-emerald-200 mb-8 text-left">
        <p class="text-sm text-emerald-800 mb-2 font-semibold">Mã giao dịch: <span class="text-emerald-700 font-normal">#45R789T6</span></p>
        <p class="text-sm text-emerald-800 font-semibold">Tổng tiền: <span class="text-emerald-700 font-normal">1,250,000 VNĐ</span></p>
    </div>

    <!-- Nút quay lại -->
    <a href="index.html" class="btn-gradient w-full text-white py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:ring-opacity-50">
        Quay Lại Trang Chủ
    </a>
</div>

</body>
</html>
