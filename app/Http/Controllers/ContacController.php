<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContacController extends Controller
{
    /**
     * Trang hiển thị form liên hệ
     */
    public function index()
    {
        $title = "Trang Contact";
        $product = DB::table('tbl_product')->orderBy('product_id', 'desc')->first();
        $event = DB::table('tbl_event')->orderBy('id', 'desc')->first();
        $instructors = DB::table('tbl_instructors')->orderBy('instructors_id', 'desc')->first();

        return view('clients.Contact', compact('title', 'product', 'instructors', 'event'));
    }

    /**
     * Xử lý gửi email liên hệ (AJAX)
     */
    public function send(Request $request)
    {
        // Validate dữ liệu + CAPTCHA
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        try {
            // Gửi mail
            Mail::send('clients.contactgui', [
                'name' => $validated['name'],
                'phone_number' => $validated['phone_number'],
                'email' => $validated['email'],
                'message_body' => $validated['message'],
            ], function ($mail) use ($validated) {
                $mail->to('hangmnm@gmail.com')
                     ->subject('Đăng Ký Khóa Học: ' . $validated['name'])
                     ->from($validated['email'], $validated['name']);
            });

            // Trả về JSON nếu gửi thành công
            return response()->json([
                'status' => 'success',
                'message' => 'Thông tin đã được gửi thành công. Chúng tôi sẽ liên hệ lại sớm!'
            ], 200);

        } catch (\Exception $e) {
            // Log lỗi để debug
            Log::error('Mail error: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi gửi mail. Vui lòng thử lại sau.'
            ], 500);
        }
    }
}
