<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo VNPAY</title>
</head>
<body>
    <h2>Demo Thanh Toán VNPAY</h2>
    <form action="{{ route('vnpay.create') }}" method="POST">
        @csrf
        <label>Số tiền (VND):</label>
        <input type="number" name="amount" value="1000" min="100" required>
        <button type="submit">Thanh toán</button>
    </form>
</body>
</html>
