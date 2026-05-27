<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout DienCode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        :root {
            --primary: #1d3557;
            --secondary: #457b9d;
            --accent: #e63946;
            --success: #06d6a0;
            --bg: #f5f7fa;
            --white: #ffffff;
            --text: #222;
            --radius: 16px;
            --shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
            --gradient: linear-gradient(135deg, #1d3557 0%, #457b9d 100%);
        }

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            font-size: 16px;
        }

        h1,
        h2,
        h4 {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 20px;
        }

        h1.checkout-header {
            font-size: 2rem;
            letter-spacing: 0.5px;
            position: relative;
            text-align: center;
            margin-bottom: 40px;
        }

        h1.checkout-header::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--accent);
            border-radius: 2px;
            left: 50%;
            bottom: -12px;
            transform: translateX(-50%);
        }

        .checkout-container {
            max-width: 1200px;
            margin: 50px auto;
            background: var(--white);
            display: flex;
            gap: 40px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .checkout-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.12);
        }

        .checkout-info {
            flex: 1;
            padding: 50px 45px;
            background: linear-gradient(135deg, #ffffff 0%, #f9fbfd 100%);
        }

        .checkout-header {
            font-size: 1.3rem;
            color: var(--primary);
            margin-bottom: 25px;
            position: relative;
        }

        .checkout-header::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 70px;
            height: 3px;
            background: var(--secondary);
            border-radius: 10px;
        }

        .checkout__infor {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 35px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #333;
        }

        .form-group input {
            border: 1.5px solid #d0dae3;
            border-radius: 12px;
            height: 52px;
            padding: 12px 16px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            background: #fff;
        }

        .form-group input:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(69, 123, 157, 0.15);
            outline: none;
        }

        .privacy-section {
            background: #f0f4f8;
            border-left: 4px solid var(--secondary);
            border-radius: var(--radius);
            padding: 20px;
            color: #333;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        .privacy-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .privacy-checkbox input {
            width: 18px;
            height: 18px;
            accent-color: var(--accent);
        }

        .privacy-checkbox label {
            font-size: 0.9rem;
        }

        .privacy-checkbox a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
        }

        .privacy-checkbox a:hover {
            color: var(--primary);
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1.5px solid #dbe3ec;
            border-radius: var(--radius);
            padding: 16px 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            background: #fff;
            cursor: pointer;
        }

        .payment-option:hover {
            border-color: var(--secondary);
            box-shadow: 0 8px 20px rgba(69, 123, 157, 0.15);
            transform: translateY(-2px);
        }

        .payment-option input[type="radio"] {
            appearance: none;
            width: 22px;
            height: 22px;
            border: 2px solid #bbb;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        .payment-option input[type="radio"]:checked {
            border-color: var(--secondary);
            background: radial-gradient(var(--secondary) 45%, transparent 50%);
            box-shadow: 0 0 0 4px rgba(69, 123, 157, 0.2);
        }

        .payment-option img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            border-radius: 10px;
        }

        .checkout-summary {
            width: 420px;
            background: #f9fbfd;
            padding: 40px 35px;
            border-left: 1px solid #e2e8f0;
            position: sticky;
            top: 50px;
        }

        .summary-section {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 30px 25px 40px;
        }

        .summary-section h4 {
            color: var(--primary);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .order-summary {
            border-top: 1px solid #e3e8ef;
            margin-top: 20px;
            padding-top: 15px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.96rem;
        }

        .summary-item.total-price {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--accent);
        }

        .checkout-btn {
            width: 100%;
            background: var(--gradient);
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: var(--radius);
            padding: 16px;
            margin-top: 25px;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(69, 123, 157, 0.25);
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #18314f, #3a6ea5);
            box-shadow: 0 10px 24px rgba(69, 123, 157, 0.35);
        }

        @media (max-width: 992px) {
            .checkout-container {
                flex-direction: column;
                margin: 25px;
            }

            .checkout__infor {
                grid-template-columns: 1fr;
            }

            .checkout-summary {
                width: 100%;
                position: static;
            }
        }

        @media (max-width: 576px) {
            h1.checkout-header {
                font-size: 1.5rem;
            }

            .checkout-info {
                padding: 30px 20px;
            }
        }

        /* --- CSS cơ bản giữ nguyên từ bản cũ --- */
        body { font-family: 'Poppins', sans-serif; background: #f5f7fa; color: #222; }
        h1.checkout-header { text-align:center; margin-bottom:40px; color:#1d3557; }
        .checkout-container { max-width:1200px; margin:50px auto; display:flex; gap:40px; background:#fff; border-radius:16px; overflow:hidden; }
        .checkout-info { flex:1; padding:50px 45px; background:#f9fbfd; }
        .checkout-summary { width:420px; background:#f9fbfd; padding:40px 35px; border-left:1px solid #e2e8f0; position:sticky; top:50px; }
        .summary-section { background:#fff; border-radius:16px; padding:30px 25px 40px; box-shadow:0 12px 28px rgba(0,0,0,0.08); }
        .summary-item { display:flex; justify-content:space-between; margin-bottom:10px; font-size:0.96rem; }
        .summary-item.total-price { font-weight:700; color:#e63946; }
        .checkout-btn { width:100%; background:linear-gradient(135deg, #1d3557 0%, #457b9d 100%); color:#fff; font-weight:600; border:none; border-radius:16px; padding:16px; margin-top:25px; }
        .checkout-btn:hover { transform:translateY(-2px); background:linear-gradient(135deg,#18314f,#3a6ea5); }
        .form-group input { border:1.5px solid #d0dae3; border-radius:12px; height:52px; padding:12px 16px; }
        .form-group input:focus { border-color:#457b9d; outline:none; }
        .payment-option { display:flex; align-items:center; gap:15px; border:1.5px solid #dbe3ec; border-radius:16px; padding:16px 20px; margin-bottom:15px; cursor:pointer; }
        .payment-option input[type="radio"] { width:22px; height:22px; accent-color:#e63946; margin-right:10px; }
        @media (max-width:992px) { .checkout-container { flex-direction:column; margin:25px; } .checkout-summary { width:100%; position:static; } }
        @media (max-width:576px) { h1.checkout-header { font-size:1.5rem; } .checkout-info { padding:30px 20px; } }
    </style>
</head>
<body>
@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();

    $adultPrice = (float)$product->product_price;
    $childPrice = $adultPrice * 0.5;

    $adultTotal = $booking->adult * $adultPrice;
    $childTotal = $booking->child * $childPrice;
    $totalPrice = $adultTotal + $childTotal;
@endphp

<section class="container">
    <h1 class="checkout-header">Tổng Quan Về Chuyến Đi</h1>

    <form action="javascript:void(0);" class="checkout-container">
        <!-- Thông tin liên lạc -->
        <div class="checkout-info">
            <h2>Thông Tin Liên Lạc</h2>
            <div class="checkout__infor">
                <div class="form-group">
                    <label>Họ và tên*</label>
                    <input type="text" value="{{ $user->name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Email*</label>
                    <input type="email" value="{{ $user->email }}" readonly>
                </div>
                <div class="form-group">
                    <label>SĐT*</label>
                    <input type="tel" placeholder="Nhập số điện thoại liên hệ" required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ*</label>
                    <input type="text" placeholder="Nhập địa chỉ liên hệ" required>
                </div>
            </div>

            <!-- Điều khoản -->
            <div class="privacy-section">
                <p>Bằng cách nhấn "ĐỒNG Ý", bạn đồng ý các điều kiện dịch vụ.</p>
                <div class="privacy-checkbox">
                    <input type="checkbox" required>
                    <label>Tôi đã đọc và đồng ý với <a href="#">Điều khoản thanh toán</a></label>
                </div>
            </div>

            <!-- Phương thức thanh toán -->
            <h2>Phương Thức Thanh Toán</h2>
            <label class="payment-option">
                <input type="radio" name="payment" value="offline" required> Thanh toán tại văn phòng
            </label>
            <label class="payment-option">
                <input type="radio" name="payment" value="paypal" required> Thanh toán bằng PayPal
            </label>
            <label class="payment-option">
                <input type="radio" name="payment" value="momo" required> Thanh toán bằng MoMo
            </label>

            <!-- Mã giảm giá -->
            <div class="form-group mt-3">
                <label>Mã giảm giá</label>
                <input type="text" id="discount_code" placeholder="Nhập mã giảm giá nếu có">
                <small id="discount-message" style="display:none;"></small>
            </div>
        </div>

        <!-- Summary -->
        <div class="checkout-summary">
            <div class="summary-section">
                <p><strong>Mã tour:</strong> {{ $product->product_id }}</p>
                <h4>{{ $product->product_name }}</h4>
                <p><strong>Ngày khởi hành:</strong> {{ $booking->start_date }}</p>
                <p><strong>Giờ khởi hành:</strong> {{ $booking->time }}</p>

                <div class="order-summary">
                    <div class="summary-item">
                        <span>Người lớn:</span>
                        <span>{{ $booking->adult }} × {{ number_format($adultPrice,0,',','.') }} VNĐ (Tổng: {{ number_format($adultTotal,0,',','.') }} VNĐ)</span>
                    </div>
                    <div class="summary-item">
                        <span>Trẻ em:</span>
                        <span>{{ $booking->child }} × {{ number_format($childPrice,0,',','.') }} VNĐ (Tổng: {{ number_format($childTotal,0,',','.') }} VNĐ)</span>
                    </div>
                    <div class="summary-item total-price">
                        <span>Tổng cộng:</span>
                        <span id="total-price">{{ number_format($totalPrice,0,',','.') }} VNĐ</span>
                    </div>
                    <div class="summary-item total-price" id="discount-total" style="display:none;">
                        <span>Tổng sau giảm giá:</span>
                        <span id="discount-price">0 VNĐ</span>
                    </div>
                </div>

                <button class="checkout-btn">Xác Nhận và Thanh Toán</button>
            </div>
        </div>
    </form>
</section>

<script>
    const discountCodes = @json($discountCodes);
    const totalPrice = {{ $totalPrice }};
    const discountInput = document.querySelector('#discount_code');
    const discountMsg = document.querySelector('#discount-message');
    const discountDiv = document.querySelector('#discount-total');
    const discountPriceSpan = document.querySelector('#discount-price');
    const totalPriceSpan = document.querySelector('#total-price');

    discountInput.addEventListener('blur', function() {
        const code = this.value.trim().toUpperCase();
        if (code && discountCodes[code] !== undefined) {
            const percent = Number(discountCodes[code]);
            const newTotal = totalPrice * (1 - percent / 100);
            discountMsg.style.display = 'block';
            discountMsg.style.color = 'green';
            discountMsg.textContent = `Mã giảm giá hợp lệ! Giảm ${percent}%`;
            discountDiv.style.display = 'flex';
            discountPriceSpan.textContent = newTotal.toLocaleString('vi-VN') + ' VNĐ';
        } else if (code) {
            discountMsg.style.display = 'block';
            discountMsg.style.color = 'red';
            discountMsg.textContent = 'Mã giảm giá không hợp lệ!';
            discountDiv.style.display = 'none';
        } else {
            discountMsg.style.display = 'none';
            discountDiv.style.display = 'none';
        }
    });

    document.querySelector('.checkout-btn').addEventListener('click', function(e){
        e.preventDefault();
        const payment = document.querySelector('input[name="payment"]:checked');
        if(!payment){ alert('Vui lòng chọn phương thức thanh toán!'); return; }

        const discountCode = discountInput.value.trim();
        const finalAmount = discountDiv.style.display === 'flex' ? discountPriceSpan.textContent.replace(/\D/g,'') : totalPrice;

        if(payment.value === 'paypal'){
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('vnpay.create') }}";

            const csrf = document.createElement('input');
            csrf.type='hidden'; csrf.name='_token'; csrf.value='{{ csrf_token() }}';
            form.appendChild(csrf);

            const orderId = document.createElement('input');
            orderId.type='hidden'; orderId.name='order_id'; orderId.value='{{ $booking->id }}';
            form.appendChild(orderId);

            const amount = document.createElement('input');
            amount.type='hidden'; amount.name='amount'; amount.value=finalAmount;
            form.appendChild(amount);

            const discount = document.createElement('input');
            discount.type='hidden'; discount.name='discount_code'; discount.value=discountCode;
            form.appendChild(discount);

            document.body.appendChild(form);
            form.submit();
        } else if(payment.value==='momo'){
            alert('Demo: Chức năng thanh toán MoMo sẽ được tích hợp sau.');
        } else {
            window.location.href="{{ route('offline-waiting') }}?discount=" + discountCode;
        }
    });
</script>
</body>
</html>
