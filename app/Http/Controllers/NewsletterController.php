<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
  public function sendEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $to_email = "hangmnm@gmail.com";
    $data = ['email' => $request->email];

    Mail::send('clients.newsletter', $data, function ($message) use ($to_email) {
        $message->to($to_email)->subject("Đăng ký nhận hỗ trợ");
    });

    return response()->json([
        'status' => 'success',
        'message' => 'Cảm ơn! Chúng tôi đã nhận email của bạn.'
    ]);
}


}
