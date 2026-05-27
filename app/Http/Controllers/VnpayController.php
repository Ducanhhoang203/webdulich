<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VnPayController extends Controller
{
    public function createPayment(Request $request)
    {
        $vnp_TmnCode   = config('vnpay.vnp_TmnCode');
        $vnp_HashSecret= config('vnpay.vnp_HashSecret');
        $vnp_Url       = config('vnpay.vnp_Url');
        $vnp_ReturnUrl = config('vnpay.vnp_ReturnUrl');

        $amount        = (float) ($request->amount ?? 100);
        $vnp_TxnRef    = time();
        $vnp_OrderInfo = 'Demo thanh toan #' . $vnp_TxnRef;
        $vnp_Amount    = $amount * 100;
        $vnp_IpAddr    = $request->ip() ?: '127.0.0.1';
        $vnp_CreateDate= Carbon::now('Asia/Ho_Chi_Minh')->format('YmdHis');
        $vnp_Locale    = 'vn';
        $vnp_OrderType = 'billpayment';

        $inputData = [
            "vnp_Version"    => "2.1.0",
            "vnp_TmnCode"    => $vnp_TmnCode,
            "vnp_Amount"     => $vnp_Amount,
            "vnp_Command"    => "pay",
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_CurrCode"   => "VND",
            "vnp_IpAddr"     => $vnp_IpAddr,
            "vnp_Locale"     => $vnp_Locale,
            "vnp_OrderInfo"  => $vnp_OrderInfo,
            "vnp_OrderType"  => $vnp_OrderType,
            "vnp_ReturnUrl"  => $vnp_ReturnUrl,
            "vnp_TxnRef"     => $vnp_TxnRef,
        ];

        // --- Sắp xếp mảng theo key ---
        ksort($inputData);

        // --- Tạo hash chuẩn cho VNPAY ---
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($value !== null && $value !== "") {
                $hashData .= $key . "=" . $value . "&"; // **KHÔNG urlencode**
            }
        }
        $hashData = rtrim($hashData, "&");

        $vnp_SecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // --- Tạo query string chuẩn ---
        $query = http_build_query($inputData);
        $vnp_Url .= '?' . $query . '&vnp_SecureHash=' . $vnp_SecureHash;

        // --- Redirect sang VNPAY sandbox ---
        return redirect()->to($vnp_Url);
    }
}
