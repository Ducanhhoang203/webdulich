<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; // Thêm Facade để quản lý file an toàn hơn
use App\Models\UserNguoiDung; // Giữ lại tên Model của bạn

class bs5Controller extends Controller // Đã đổi tên controller
{
    /**
     * Hiển thị trang hồ sơ cá nhân.
     * Route: GET /profile
     */
    public function index()
    {
        // Sử dụng guard 'web' để lấy người dùng đã đăng nhập
        $user = Auth::guard('web')->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem hồ sơ.');
        }

        // Truyền dữ liệu người dùng qua view 'clients.bs5'
        return view('clients.bs5', compact('user'));
    }



    /**
     * Cập nhật thông tin cá nhân (tên, email).
     * Route: POST /profile/update-info
     */
    public function update(Request $request)
    {
        $user = Auth::guard('web')->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để cập nhật thông tin.');
        }

        // Quy tắc xác thực: email là duy nhất trong bảng usernguoidung, nhưng loại trừ email của chính user đó.
        $request->validate([
            'name'  => 'required|string|max:255',
            // Đảm bảo tên bảng là 'usernguoidung' như bạn đã định nghĩa
            'email' => 'required|email|unique:usernguoidung,email,' . $user->id, 
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        // ✅ Sau khi lưu quay về trang home
        return redirect()->route('home')->with('success', 'Cập nhật thông tin thành công!');
    }

    /**
     * Cập nhật ảnh đại diện (avatar).
     * Route: POST /profile/update-avatar
     */
    public function updateAvatar(Request $request)
    {
        $user = Auth::guard('web')->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để đổi ảnh đại diện.');
        }

        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Tối đa 2MB
        ]);

        // 1. Xử lý xóa ảnh cũ an toàn hơn
        if (!empty($user->avatar)) {
            $oldAvatarPath = public_path($user->avatar);
            
            // Đảm bảo file tồn tại và nằm trong thư mục 'uploads' trước khi xóa
            if (File::exists($oldAvatarPath) && str_starts_with($user->avatar, 'uploads/')) {
                 File::delete($oldAvatarPath);
            }
        }
        
        // 2. Lưu ảnh mới vào thư mục public/uploads
        $file = $request->file('avatar');
        // Tạo tên file duy nhất để tránh trùng lặp
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        // 3. Cập nhật đường dẫn ảnh mới vào database
        $user->avatar = 'uploads/' . $filename;
        $user->save();

        // ✅ Ở lại trang profile
        return redirect()->route('profile.index')->with('success', 'Cập nhật ảnh đại diện thành công!');
    }

 

    /**
     * Đổi mật khẩu người dùng.
     * Route: POST /profile/update-password
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::guard('web')->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để đổi mật khẩu.');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed', // 'confirmed' yêu cầu trường 'new_password_confirmation' phải khớp
        ]);

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            // Sử dụng back() để quay lại form và giữ lại dữ liệu cũ
            return back()->with('error', 'Mật khẩu hiện tại không đúng!');
        }

        // Cập nhật mật khẩu mới và băm (hash)
        $user->password = Hash::make($request->new_password);
        $user->save();

        // ✅ Ở lại trang profile
        return redirect()->route('profile.index')->with('success', 'Đổi mật khẩu thành công!');
    }
}