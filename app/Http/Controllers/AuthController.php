<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    public function all_admin(Request $request)
{
    $query = DB::table('tbl_admin');

    // Tìm email hoặc tên
    if ($request->keyword) {
        $query->where(function ($q) use ($request) {
            $q->where('admin_email', 'LIKE', '%' . $request->keyword . '%')
              ->orWhere('admin_name', 'LIKE', '%' . $request->keyword . '%');
        });
    }

    // Lọc theo cấp độ admin
    if ($request->level !== null && $request->level !== '') {
        $query->where('admin_level', $request->level);
    }

    // Lấy kết quả
    $all_admin = $query->orderBy('id', 'desc')->get();

    return view('admin.admin_list')->with('all_admin', $all_admin);
}
 // Form sửa admin
    public function edit_admin($id)
    {
        $edit_admin = DB::table('tbl_admin')->where('id', $id)->first();
        return view('admin.edit_admin')->with('admin', $edit_admin);
    }

    // Update admin
    public function update_admin(Request $request, $id)
    {
        $data = [];
        $data['admin_email'] = $request->admin_email;
        $data['admin_name'] = $request->admin_name;
        $data['admin_phone'] = $request->admin_phone;
        $data['admin_level'] = $request->admin_level;

        DB::table('tbl_admin')->where('id', $id)->update($data);

        Session::put('message', 'Cập nhật admin thành công!');
        return redirect()->route('all_admin');
    }

    // Xóa admin
    public function delete_admin($id)
    {
        DB::table('tbl_admin')->where('id', $id)->delete();
        Session::put('message', 'Xóa admin thành công!');
        return redirect()->route('all_admin');
    }
    // Hiển thị form thêm admin
public function add_admin_form()
{
    return view('admin.add_admin');
}

// Xử lý lưu admin mới
public function store_admin(Request $request)
{
    // Validate dữ liệu
    $request->validate([
        'admin_email' => 'required|email|unique:tbl_admin,admin_email',
        'admin_name' => 'required|string|max:255',
        'admin_password' => 'required|string|min:6',
        'admin_phone' => 'nullable|string|max:20',
        'admin_level' => 'required|integer|in:1,2', // 1 hoặc 2
    ]);

    DB::table('tbl_admin')->insert([
        'admin_email' => $request->admin_email,
        'admin_password' => Hash::make($request->admin_password),
        'admin_name' => $request->admin_name,
        'admin_phone' => $request->admin_phone,
        'admin_level' => $request->admin_level,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('all_admin')->with('message', 'Thêm admin mới thành công!');
}


}
