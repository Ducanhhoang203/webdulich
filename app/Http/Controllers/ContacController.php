<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class ContacController extends Controller
{
    /**
     * Trang hiển thị form liên hệ
     */
    public function index()
    {
        $title = "Trang Contact";
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->first();
        $event= DB::table('tbl_event')->orderBy('id','desc')->first();
        $instructors= DB::table('tbl_instructors')->orderBy('instructors_id','desc')->first();
        return view('clients.Contact', compact('title','product','instructors','event'));
    }

    /**
     * Xử lý gửi email liên hệ
     */
    public function send(Request $request)
    {
        // ✅ Validate dữ liệu
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email'        => 'required|email',
            'message'      => 'required|string',
        ]);

        // ✅ Gửi email
        Mail::send('clients.contactgui', [
            'name'         => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'email'        => $validated['email'],
            'message_body' => $validated['message'] // Đổi tên key để tránh trùng "message" của Laravel
        ], function ($mail) use ($validated) {
            $mail->to('hangmnm@gmail.com') // Gmail nhận
                 ->subject('Đăng Ký Khóa Học: ' . $validated['name'])
                 ->from($validated['email'], $validated['name']); // Người gửi
        });

        return redirect()->back()->with('success', 'Thông tin đã được gửi thành công. Chúng tôi sẽ liên hệ lại sớm!');
    }
}
