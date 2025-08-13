<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    public function add_footer()
    {
        $footer_info = DB::table('footer_info')->orderBy('id', 'desc')->get();
        return view('admin.add_footer', compact('footer_info'));
    }
    public function all_footer()
{
    $footer_info = DB::table('footer_info')->orderBy('id', 'desc')->get();
    return view('admin.all_footer', compact('footer_info'));
}


    public function save_footer(Request $request)
    {
        $request->validate([
            'logo_path' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description_text' => 'nullable|string',
            'slogan_text' => 'nullable|string'
        ]);

        if ($request->hasFile('logo_path')) {
            $logoName = time() . '_' . $request->file('logo_path')->getClientOriginalName();
            $request->file('logo_path')->move(public_path('uploads/footer'), $logoName);
            $logoPath = 'uploads/footer/' . $logoName;
        } else {
            $logoPath = null;
        }

        DB::table('footer_info')->insert([
            'logo_path' => $logoPath,
            'description_text' => $request->description_text,
            'slogan_text' => $request->slogan_text,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Thêm thông tin footer thành công!');
    }

    public function edit_footer($id)
    {
        $footer = DB::table('footer_info')->where('id', $id)->first();
        if (!$footer) {
            return redirect()->back()->with('error', 'Không tìm thấy footer!');
        }
        return view('admin.edit_footer', compact('footer'));
    }

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

        if ($request->hasFile('logo_path')) {
            $logoName = time() . '_' . $request->file('logo_path')->getClientOriginalName();
            $request->file('logo_path')->move(public_path('uploads/footer'), $logoName);
            $data['logo_path'] = 'uploads/footer/' . $logoName;
        }

        DB::table('footer_info')->where('id', $id)->update($data);

        return redirect()->to('add-footer')->with('success', 'Cập nhật footer thành công!');
    }

    public function delete_footer($id)
    {
        DB::table('footer_info')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa footer thành công!');
    }
}
