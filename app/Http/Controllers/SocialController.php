<?php

namespace App\Http\Controllers;

use App\Models\Usernguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    // Chuyển hướng tới Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Xử lý callback từ Facebook
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // Kiểm tra nếu user đã tồn tại
            $user = Usernguoidung::firstOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name' => $facebookUser->getName(),
                    'password' => bcrypt(Str::random(16)), // tạo mật khẩu ngẫu nhiên
                ]
            );

            Auth::login($user);

            return redirect('/')->with('success', 'Đăng nhập bằng Facebook thành công!');
        } catch (\Exception $e) {
            return redirect('/dangnhap')->with('error', 'Đăng nhập Facebook thất bại!');
        }
    }
}
