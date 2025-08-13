<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class about_section extends Controller
{
    public function add_section()
    {
        $about_section = DB::table('about_sections')->orderBy('id', 'desc')->get();
        return view('admin.add_section', compact('about_section'));
    }

    public function save_section(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'popular_destinations' => 'required|integer|min:0',
            'satisfied_clients' => 'required|integer|min:0',
            'image_main' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'shapes' => 'nullable|array', // shapes là mảng các file ảnh
            'shapes.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048', // validate từng ảnh shapes
        ]);

        // 2. Xử lý upload ảnh chính
        $imageName = null;
        if ($request->hasFile('image_main')) {
            $file = $request->file('image_main');
            $imageName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/about'), $imageName);
        }

        // 3. Xử lý upload nhiều ảnh shapes
        $shapesArr = [];
        if ($request->hasFile('shapes')) {
            foreach ($request->file('shapes') as $file) {
                $name = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about/shapes'), $name);
                // Lưu đường dẫn tương đối để sau này hiển thị
                $shapesArr[] = 'uploads/about/shapes/' . $name;
            }
        }

        // 4. Lưu dữ liệu vào DB
        DB::table('about_sections')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'experience_years' => $request->experience_years,
            'popular_destinations' => $request->popular_destinations,
            'satisfied_clients' => $request->satisfied_clients,
            'image_main' => $imageName,
            'shapes' => !empty($shapesArr) ? json_encode($shapesArr) : null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 5. Chuyển hướng kèm thông báo
        return redirect()->back()->with('success', 'Thêm About Section thành công!');
    }
      public function all_section()
    {
        $about_sections = DB::table('about_sections')->orderBy('id', 'desc')->get();
        return view('admin.all_section', compact('about_sections'));
    }

    // Hiển thị form chỉnh sửa một about section theo id
    // Hiển thị form chỉnh sửa
    public function edit_section($id)
    {
        $section = DB::table('about_sections')->where('id', $id)->first();

        // Giải mã shapes JSON thành mảng
        $shapes = $section->shapes ? json_decode($section->shapes, true) : [];

        return view('admin.edit_section', compact('section', 'shapes'));
    }

    // Xử lý cập nhật dữ liệu
    public function update_section(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'popular_destinations' => 'required|integer|min:0',
            'satisfied_clients' => 'required|integer|min:0',
            'image_main' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'shapes' => 'nullable|array',
            'shapes.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Lấy bản ghi hiện tại
        $section = DB::table('about_sections')->where('id', $id)->first();

        // Xử lý upload ảnh chính nếu có thay đổi
        $imageName = $section->image_main;
        if ($request->hasFile('image_main')) {
            $file = $request->file('image_main');
            $imageName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/about'), $imageName);
        }

        // Xử lý upload shapes mới, nếu có
        $shapesArr = $section->shapes ? json_decode($section->shapes, true) : [];
        if ($request->hasFile('shapes')) {
            $shapesArr = []; // reset shapes nếu muốn thay mới hoàn toàn
            foreach ($request->file('shapes') as $file) {
                $name = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about/shapes'), $name);
                $shapesArr[] = 'uploads/about/shapes/' . $name;
            }
        }

        // Cập nhật dữ liệu
        DB::table('about_sections')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'experience_years' => $request->experience_years,
            'popular_destinations' => $request->popular_destinations,
            'satisfied_clients' => $request->satisfied_clients,
            'image_main' => $imageName,
            'shapes' => !empty($shapesArr) ? json_encode($shapesArr) : null,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Cập nhật About Section thành công!');
    }

    // Xóa about section theo id
    public function delete_section($id)
    {
        $section = DB::table('about_sections')->where('id', $id)->first();
        if (!$section) {
            return redirect()->back()->with('error', 'Không tìm thấy About Section!');
        }

        // Có thể xóa file ảnh liên quan nếu muốn (image_main + shapes)

        DB::table('about_sections')->where('id', $id)->delete();

        return redirect()->route('admin.all_section')->with('success', 'Xóa About Section thành công!');
    }
}
