<?php

namespace App\Http\Controllers;

use App\Models\Usernguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLogin()
    { 
        // Nếu người dùng từ trang chi tiết vào login, lưu URL hiện tại để redirect sau login
        if (!session()->has('url.intended')) {
            session()->put('url.intended', url()->previous());
        }

        return view('auth.loginuser');
    }

    // Hiển thị form đăng ký
    public function showRegister()
    {
        return view('auth.register');
    }

    // Đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:usernguoidung,email',
            'pass'  => [
                'required',
                'min:6',
                'confirmed',
                function ($attribute, $value, $fail) {
                    $errors = [];
                    if (!preg_match('/[A-Z]/', $value)) $errors[] = 'chữ hoa';
                    if (!preg_match('/[a-z]/', $value)) $errors[] = 'chữ thường';
                    if (!preg_match('/[0-9]/', $value)) $errors[] = 'số';
                    if (!preg_match('/[!@#$%^&*()_+\[\]{};:,.<>?\/]/', $value)) $errors[] = 'ký tự đặc biệt';
                    if (count($errors) > 1) {
                        $fail('Mật khẩu phải có ít nhất 3 trong 4 loại ký tự: ' . implode(', ', $errors));
                    }
                }
            ],
        ], [
            'name.required' => 'Bạn phải nhập tên.',
            'name.string' => 'Tên không hợp lệ.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',

            'email.required' => 'Bạn phải nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',

            'pass.required' => 'Bạn phải nhập mật khẩu.',
            'pass.min' => 'Mật khẩu phải ít nhất 6 ký tự.',
            'pass.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        // Tạo user mới
        Usernguoidung::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->pass),
        ]);

        return redirect('/dangnhap')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    // Đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'your_name' => 'required|email',
            'your_pass' => 'required',
        ], [
            'your_name.required' => 'Bạn phải nhập email.',
            'your_name.email' => 'Email không hợp lệ.',
            'your_pass.required' => 'Bạn phải nhập mật khẩu.',
        ]);

        if (Auth::attempt(['email' => $credentials['your_name'], 'password' => $credentials['your_pass']])) {
            $request->session()->regenerate();

            // Chuyển hướng về URL trước đó nếu có, mặc định về '/'
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'your_name' => 'Thông tin đăng nhập không chính xác!',
        ]);
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/dangnhap')->with('success', 'Đã đăng xuất!');
    }
}
