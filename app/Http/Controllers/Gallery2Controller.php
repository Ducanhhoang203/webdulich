<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Gallery2Controller extends Controller
{
    public function add_hocvien()
    {
        return view('admin.add_hocvien');
    }

    public function all_hocvien()
    {
        $all_gallery = DB::table('tbl_galleries')->orderBy('id', 'desc')->get();
        return view('admin.all_hocvien', compact('all_gallery'));
    }

    public function save_hocvien(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'alt_text'   => 'nullable|string|max:255'
        ]);

        // Xử lý upload ảnh
        $imageName = time() . '_' . $request->file('image_path')->getClientOriginalName();
        $request->file('image_path')->move(public_path('uploads/gallery'), $imageName);

        DB::table('tbl_galleries')->insert([
            'image_path' => 'uploads/gallery/' . $imageName,
            'alt_text'   => $request->alt_text,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/all-hocvien')->with('success', 'Thêm ảnh thành công!');
    }

    public function edit_hocvien($id)
    {
        $edit_gallery = DB::table('tbl_galleries')->where('id', $id)->first();

        if (!$edit_gallery) {
            return redirect('/all-hocvien')->with('error', 'Ảnh không tồn tại!');
        }

        return view('admin.edit_hocvien', compact('edit_gallery'));
    }

    public function update_hocvien(Request $request, $id)
    {
        $request->validate([
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'alt_text'   => 'nullable|string|max:255'
        ]);

        $data = [
            'alt_text'   => $request->alt_text,
            'updated_at' => now()
        ];

        if ($request->hasFile('image_path')) {
            $imageName = time() . '_' . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move(public_path('uploads/gallery'), $imageName);
            $data['image_path'] = 'uploads/gallery/' . $imageName;
        }

        DB::table('tbl_galleries')->where('id', $id)->update($data);

        return redirect('/all-hocvien')->with('success', 'Cập nhật ảnh thành công!');
    }

    public function delete_hocvien($id)
    {
        $gallery = DB::table('tbl_galleries')->where('id', $id)->first();

        if ($gallery && file_exists(public_path($gallery->image_path))) {
            unlink(public_path($gallery->image_path)); // Xóa file ảnh khỏi thư mục
        }

        DB::table('tbl_galleries')->where('id', $id)->delete();
        return redirect('/all-hocvien')->with('success', 'Xóa ảnh thành công!');
    }
}
