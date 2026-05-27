<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\UserNguoiDung; // hoặc User nếu bạn dùng mặc định
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot_password');
    }

    public function sendCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = UserNguoiDung::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email không tồn tại trong hệ thống.');
        }

        $code = rand(100000, 999999);
        Session::put('reset_email', $user->email);
        Session::put('reset_code', $code);

        // Gửi email
        Mail::raw("Mã xác nhận của bạn là: $code", function ($message) use ($user) {
            $message->to($user->email)->subject('Mã xác nhận đổi mật khẩu');
        });

        return redirect()->route('password.verifyForm')->with('success', 'Mã xác nhận đã được gửi đến email của bạn.');
    }

    public function showVerifyForm()
    {
        return view('auth.verify_code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required']);
        if ($request->code == Session::get('reset_code')) {
            return redirect()->route('password.resetForm');
        } else {
            return back()->with('error', 'Mã xác nhận không đúng!');
        }
    }

    public function showResetForm()
    {
        return view('auth.reset_password');
    }

   public function resetPassword(Request $request)
{
    // Validate password
    $request->validate([
        'password' => [
            'required',
            'string',
            'min:6',             // tối thiểu 6 ký tự
            'confirmed',         // phải khớp password_confirmation
            'regex:/[a-z]/',     // ít nhất 1 chữ thường
            'regex:/[A-Z]/',     // ít nhất 1 chữ hoa
            'regex:/[0-9]/',     // ít nhất 1 số
            'regex:/[@$!%*#?&]/' // ít nhất 1 ký tự đặc biệt
        ],
    ], [
        'password.required' => 'Vui lòng nhập mật khẩu mới.',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        'password.regex' => 'Mật khẩu phải có ít nhất 1 chữ hoa, 1 chữ thường, 1 số và 1 ký tự đặc biệt.'
    ]);

    $email = Session::get('reset_email');
    $user = UserNguoiDung::where('email', $email)->first();

    if ($user) {
        $user->password = Hash::make($request->password);
        $user->save();

        // Xóa session
        Session::forget(['reset_email', 'reset_code']);

        return redirect()->route('dangnhap')->with('success', 'Đặt lại mật khẩu thành công!');
    }

    return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
}

}
