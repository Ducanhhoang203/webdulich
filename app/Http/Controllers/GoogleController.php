<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Usernguoidung;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    // Chuyển hướng đến Google để đăng nhập
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback sau khi đăng nhập Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Tạo hoặc cập nhật user
            $user = Usernguoidung::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name'      => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar'    => $googleUser->getAvatar(),
                ]
            );

            // Đăng nhập user
            Auth::login($user);

            // Redirect về trang trước đó nếu có, mặc định về '/'
            return redirect()->intended('/')->with('success', 'Đăng nhập Google thành công!');

        } catch (\Exception $e) {
            // Debug lỗi nếu có
            dd($e->getMessage());
        }
    }
}
