<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Gallery2Controller extends Controller
{
    // Hiển thị form thêm học viên
    public function add_hocvien()
    {
        return view('admin.add_hocvien');
    }

    // Hiển thị tất cả học viên
    public function all_hocvien()
    {
        $all_gallery = DB::table('tbl_galleris')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.all_hocvien', compact('all_gallery'));
    }

    // Lưu học viên mới
    public function save_hocvien(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'bio'    => 'required|string',
        ]);

        $data = [
            'name'       => $request->name,
            'bio'        => $request->bio, // lưu markdown gốc
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Upload avatar
        if ($request->hasFile('avatar')) {
            $imageName = time() . '_' . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('uploads/galleris'), $imageName);
            $data['avatar'] = 'uploads/galleris/' . $imageName;
        }

        DB::table('tbl_galleris')->insert($data);

        return redirect('/all-hocvien')
            ->with('success', 'Thêm học viên thành công!');
    }

    // Hiển thị form chỉnh sửa học viên
    public function edit_hocvien($id)
    {
        $edit_gallery = DB::table('tbl_galleris')->where('id', $id)->first();

        if (!$edit_gallery) {
            return redirect('/all-hocvien')
                ->with('error', 'Học viên không tồn tại!');
        }

        return view('admin.edit_hocvien', compact('edit_gallery'));
    }

    // Cập nhật học viên
    public function update_hocvien(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'bio'    => 'required|string',
        ]);

        $gallery = DB::table('tbl_galleris')->where('id', $id)->first();

        if (!$gallery) {
            return redirect('/all-hocvien')
                ->with('error', 'Học viên không tồn tại!');
        }

        $data = [
            'name'       => $request->name,
            'bio'        => $request->bio, // vẫn lưu markdown gốc
            'updated_at' => now(),
        ];

        // Nếu có upload ảnh mới
        if ($request->hasFile('avatar')) {

            // Xóa ảnh cũ
            if ($gallery->avatar && file_exists(public_path($gallery->avatar))) {
                unlink(public_path($gallery->avatar));
            }

            $imageName = time() . '_' . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('uploads/galleris'), $imageName);
            $data['avatar'] = 'uploads/galleris/' . $imageName;
        }

        DB::table('tbl_galleris')->where('id', $id)->update($data);

        return redirect('/all-hocvien')
            ->with('success', 'Cập nhật học viên thành công!');
    }

    // Xóa học viên
    public function delete_hocvien($id)
    {
        $gallery = DB::table('tbl_galleris')->where('id', $id)->first();

        if ($gallery) {

            // Xóa file ảnh
            if ($gallery->avatar && file_exists(public_path($gallery->avatar))) {
                unlink(public_path($gallery->avatar));
            }

            DB::table('tbl_galleris')->where('id', $id)->delete();
        }

        return redirect('/all-hocvien')
            ->with('success', 'Xóa học viên thành công!');
    }
}