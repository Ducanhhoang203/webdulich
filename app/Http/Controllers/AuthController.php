<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Hiển thị form login admin
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Blade login
    }

    /**
     * Xử lý login
     */
    public function login(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'admin_email' => 'required|email',
            'admin_password' => 'required',
        ]);

        $credentials = [
            'admin_email' => $request->admin_email,
            'password' => $request->admin_password,
        ];

        // Thử login với guard admin
        if (Auth::guard('admin')->attempt($credentials)) {
            // Login thành công, redirect về dashboard
            return redirect()->intended(route('dashboard'));
        }

        // Login thất bại, trả về lỗi
        return back()->withErrors([
            'admin_email' => 'Email hoặc mật khẩu không đúng!',
        ])->withInput();
    }

    /**
     * Logout admin
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.form');
    }

    /**
     * Hiển thị trang dashboard admin
     */
    public function dashboard()
    {
        return view('admin.dashboard'); // Blade dashboard admin
    }
}
