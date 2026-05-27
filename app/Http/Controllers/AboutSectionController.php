<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AboutSectionController extends Controller
{
    // --- INDEX: danh sách ---
    public function index()
    {
        $about_sections = DB::table('about_sections')->orderBy('id', 'desc')->get();
        return view('admin.all_section', compact('about_sections'));
    }

    // --- CREATE: form thêm mới ---
    public function create()
    {
        return view('admin.add_section');
    }

    // --- STORE: lưu mới ---
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'popular_destinations' => 'required|integer|min:0',
            'satisfied_clients' => 'required|integer|min:0',
            'image_main' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10048',
            'shapes' => 'nullable|array',
            'shapes.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề tối đa 255 ký tự',
            'description.required' => 'Mô tả không được để trống',
            'experience_years.required' => 'Số năm kinh nghiệm là bắt buộc',
            'experience_years.integer' => 'Số năm kinh nghiệm phải là số nguyên',
            'experience_years.min' => 'Số năm kinh nghiệm không được âm',
            'popular_destinations.required' => 'Số điểm đến nổi tiếng là bắt buộc',
            'popular_destinations.integer' => 'Số điểm đến nổi tiếng phải là số nguyên',
            'popular_destinations.min' => 'Số điểm đến nổi tiếng không được âm',
            'satisfied_clients.required' => 'Số khách hàng hài lòng là bắt buộc',
            'satisfied_clients.integer' => 'Số khách hàng hài lòng phải là số nguyên',
            'satisfied_clients.min' => 'Số khách hàng hài lòng không được âm',
            'image_main.image' => 'Ảnh chính phải là file ảnh hợp lệ',
            'image_main.mimes' => 'Ảnh chính chỉ nhận định dạng jpg, jpeg, png, gif',
            'image_main.max' => 'Ảnh chính không được lớn hơn 10MB',
            'shapes.array' => 'Shapes phải là mảng ảnh',
            'shapes.*.image' => 'Các file shapes phải là ảnh hợp lệ',
            'shapes.*.mimes' => 'Các file shapes chỉ nhận định dạng jpg, jpeg, png, gif',
            'shapes.*.max' => 'Các file shapes không được lớn hơn 2MB',
        ]);

        // Upload image_main
        $imageName = null;
        if ($request->hasFile('image_main')) {
            $file = $request->file('image_main');
            $imageName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/about'), $imageName);
        }

        // Upload shapes
        $shapesArr = [];
        if ($request->hasFile('shapes')) {
            foreach ($request->file('shapes') as $file) {
                $name = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about/shapes'), $name);
                $shapesArr[] = 'uploads/about/shapes/' . $name;
            }
        }

        // Lưu DB
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

        return redirect()->route('about_sections.index')->with('success', '✅ Thêm About Section thành công!');
    }

    // --- SHOW: hiển thị chi tiết ---
    public function show($id)
    {
        $section = DB::table('about_sections')->where('id', $id)->first();
        $shapes = $section->shapes ? json_decode($section->shapes, true) : [];
        return view('admin.show_section', compact('section', 'shapes'));
    }

    // --- EDIT: form edit ---
    public function edit($id)
    {
        $section = DB::table('about_sections')->where('id', $id)->first();
        $shapes = $section->shapes ? json_decode($section->shapes, true) : [];
        return view('admin.edit_section', compact('section', 'shapes'));
    }

    // --- UPDATE: cập nhật ---
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'popular_destinations' => 'required|integer|min:0',
            'satisfied_clients' => 'required|integer|min:0',
            'image_main' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10048',
            'shapes' => 'nullable|array',
            'shapes.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $section = DB::table('about_sections')->where('id', $id)->first();
        if (!$section) {
            return redirect()->route('about_sections.index')->with('error', 'About Section không tồn tại!');
        }

        // Update image_main
        $imageName = $section->image_main;
        if ($request->hasFile('image_main')) {
            // Xóa file cũ
            if ($imageName && file_exists(public_path('uploads/about/' . $imageName))) {
                @unlink(public_path('uploads/about/' . $imageName));
            }
            $file = $request->file('image_main');
            $imageName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/about'), $imageName);
        }

        // Update shapes (giữ shapes cũ + thêm shapes mới)
        $shapesArr = $section->shapes ? json_decode($section->shapes, true) : [];
        if ($request->hasFile('shapes')) {
            foreach ($request->file('shapes') as $file) {
                $name = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about/shapes'), $name);
                $shapesArr[] = 'uploads/about/shapes/' . $name;
            }
        }

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

        return redirect()->route('about_sections.index')->with('success', '✅ Cập nhật About Section thành công!');
    }

    // --- DESTROY: xóa ---
    public function destroy($id)
    {
        $section = DB::table('about_sections')->where('id', $id)->first();
        if (!$section) {
            return redirect()->route('about_sections.index')->with('error', 'Không tìm thấy About Section!');
        }

        // Xóa ảnh
        if ($section->image_main && file_exists(public_path('uploads/about/' . $section->image_main))) {
            @unlink(public_path('uploads/about/' . $section->image_main));
        }
        if ($section->shapes) {
            foreach (json_decode($section->shapes, true) as $shape) {
                if (file_exists(public_path($shape))) {
                    @unlink(public_path($shape));
                }
            }
        }

        DB::table('about_sections')->where('id', $id)->delete();

        return redirect()->route('about_sections.index')->with('success', '✅ Xóa About Section thành công!');
    }
}
