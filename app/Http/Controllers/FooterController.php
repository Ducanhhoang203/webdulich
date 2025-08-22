<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    // Hiển thị form thêm footer
    public function add_footer()
    {
        $footer_infor = DB::table('footer_infor')->orderBy('id', 'desc')->get();
        return view('admin.add_footer', compact('footer_infor'));
    }

    // Hiển thị tất cả footer
    public function all_footer()
    {
        $footer_infor = DB::table('footer_infor')->orderBy('id', 'desc')->get();
        return view('admin.all_footer', compact('footer_infor'));
    }

    // Lưu footer mới
    public function save_footer(Request $request)
    {
        $request->validate([
            'logo_path' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description_text' => 'nullable|string',
            'slogan_text' => 'nullable|string'
        ]);

        // Xử lý file logo
        if ($request->hasFile('logo_path')) {
            $logoName = time() . '_' . $request->file('logo_path')->getClientOriginalName();
            $request->file('logo_path')->move(public_path('uploads/footer'), $logoName);
            $logoPath = 'uploads/footer/' . $logoName;
        } else {
            $logoPath = null;
        }

        // Insert DB
        DB::table('footer_infor')->insert([
            'logo_path' => $logoPath,
            'description_text' => $request->description_text,
            'slogan_text' => $request->slogan_text,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Thêm thông tin footer thành công!');
    }

    // Sửa footer
    public function edit_footer($id)
    {
        $footer = DB::table('footer_infor')->where('id', $id)->first();
        if (!$footer) {
            return redirect()->back()->with('error', 'Không tìm thấy footer!');
        }
        return view('admin.edit_footer', compact('footer'));
    }

    // Cập nhật footer
    public function update_footer(Request $request, $id)
    {
        $request->validate([
            'logo_path' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description_text' => 'nullable|string',
            'slogan_text' => 'nullable|string'
        ]);

        $data = [
            'description_text' => $request->description_text,
            'slogan_text' => $request->slogan_text,
            'updated_at' => now()
        ];

        // Nếu có upload logo mới
        if ($request->hasFile('logo_path')) {
            $logoName = time() . '_' . $request->file('logo_path')->getClientOriginalName();
            $request->file('logo_path')->move(public_path('uploads/footer'), $logoName);
            $data['logo_path'] = 'uploads/footer/' . $logoName;
        }

        DB::table('footer_infor')->where('id', $id)->update($data);

        return redirect()->to('add-footer')->with('success', 'Cập nhật footer thành công!');
    }

    // Xóa footer
    public function delete_footer($id)
    {
        DB::table('footer_infor')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa footer thành công!');
    }
}
