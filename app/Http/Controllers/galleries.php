<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Hiển thị form thêm ảnh gallery (add_hocvien)
     */
    public function add_hocvien()
    {
        return view('clients.gallery.add_hocvien');
    }

    /**
     * Lấy tất cả ảnh gallery (all_hocvien)
     */
    public function all_hocvien()
    {
        $all_gallery = DB::table('tbl_galleries')->orderBy('id', 'desc')->get();
        return view('clients.gallery.all_hocvien')->with('all_gallery', $all_gallery);
    }

    /**
     * Lưu ảnh mới vào DB (save_hocvien)
     */
    public function save_hocvien(Request $request)
    {
        $request->validate([
            'image_path' => 'required|string|max:255',
            'alt_text' => 'nullable|string|max:255'
        ]);

        DB::table('tbl_galleries')->insert([
            'image_path' => $request->image_path,
            'alt_text'   => $request->alt_text,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/all-hocvien')->with('success', 'Thêm ảnh thành công!');
    }

    /**
     * Hiển thị form sửa ảnh (edit_hocvien)
     */
    public function edit_hocvien($id)
    {
        $edit_gallery = DB::table('tbl_galleries')->where('id', $id)->first();

        if (!$edit_gallery) {
            return redirect('/all-hocvien')->with('error', 'Ảnh không tồn tại!');
        }

        return view('clients.gallery.edit_hocvien')->with('edit_gallery', $edit_gallery);
    }

    /**
     * Cập nhật ảnh (update_hocvien)
     */
    public function update_hocvien(Request $request, $id)
    {
        $request->validate([
            'image_path' => 'required|string|max:255',
            'alt_text'   => 'nullable|string|max:255'
        ]);

        DB::table('tbl_galleries')->where('id', $id)->update([
            'image_path' => $request->image_path,
            'alt_text'   => $request->alt_text,
            'updated_at' => now()
        ]);

        return redirect('/all-hocvien')->with('success', 'Cập nhật ảnh thành công!');
    }

    /**
     * Xóa ảnh (delete_hocvien)
     */
    public function delete_hocvien($id)
    {
        DB::table('tbl_galleries')->where('id', $id)->delete();
        return redirect('/all-hocvien')->with('success', 'Xóa ảnh thành công!');
    }
}
