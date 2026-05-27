<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    // Hiển thị form thêm giảng viên
    public function add_instructors()
    {
        $product = DB::table('tbl_product')->orderBy('product_id', 'desc')->get();
        return view('admin.add_instructors', compact('product'));
    }

    // Lưu giảng viên mới
    public function save_instructors(Request $request)
    {
        $request->validate([
            'instructors_name'   => 'required|string|max:255',
            'instructors_bio'    => 'required|string|max:255',
            'instructors_image'  => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'product_cate'       => 'required|exists:tbl_product,product_id',
        ]);

        $image = $request->file('instructors_image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $uploadPath = public_path('uploads/instructors');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        $image->move($uploadPath, $imageName);

        DB::table('tbl_instructors')->insert([
            'instructors_name' => $request->instructors_name,
            'instructors_bio'  => $request->instructors_bio,
            'product_id'       => $request->product_cate,
            'instructors_image'=> $imageName,
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        return redirect('all-instructors')->with('message', 'Thêm hướng dẫn viên thành công!');
    }

    // Hiển thị danh sách giảng viên
    public function all_instructors()
    {
        $all_instructors = DB::table('tbl_instructors')
            ->join('tbl_product', 'tbl_instructors.product_id', '=', 'tbl_product.product_id')
            ->orderBy('tbl_instructors.instructors_id', 'desc')
            ->get();

        return view('admin.all_instructors', compact('all_instructors'));
    }

    // Hiển thị form sửa giảng viên
    public function edit_instructors($instructors_id)
    {
        $product = DB::table('tbl_product')->orderBy('product_id', 'desc')->get();
        $edit_value = DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->first();

        if (!$edit_value) {
            return redirect('all-instructors')->with('message', 'hướng dẫn viên không tồn tại');
        }

        return view('admin.edit_instructors', compact('product', 'edit_value'));
    }

    // Cập nhật giảng viên
    public function update_instructors(Request $request, $instructors_id)
    {
        $request->validate([
            'instructors_name'  => 'required|string|max:255',
            'instructors_bio'   => 'required|string|max:255',
            'product_cate'      => 'required|exists:tbl_product,product_id',
            'instructors_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $instructor = DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->first();
        if (!$instructor) {
            return redirect()->back()->with('message', 'Không tìm thấy hướng dẫn viên!');
        }

        $data = [
            'instructors_name' => $request->instructors_name,
            'instructors_bio'  => $request->instructors_bio,
            'product_id'       => $request->product_cate,
            'updated_at'       => now(),
        ];

        if ($request->hasFile('instructors_image')) {
            $image = $request->file('instructors_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/instructors');
            if (!file_exists($uploadPath)) mkdir($uploadPath, 0755, true);
            $image->move($uploadPath, $imageName);

            if (!empty($instructor->instructors_image)) {
                $oldImagePath = $uploadPath . '/' . $instructor->instructors_image;
                if (file_exists($oldImagePath)) unlink($oldImagePath);
            }

            $data['instructors_image'] = $imageName;
        }

        DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->update($data);

        return redirect('all-instructors')->with('message', 'Cập nhật hướng dẫn viên thành công!');
    }

    // ✅ Xóa giảng viên (method DELETE)
    public function delete_instructors($instructors_id)
    {
        $instructor = DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->first();

        if (!$instructor) {
            return redirect('all-instructors')->with('message', 'Không tìm thấy hướng dẫn viên!');
        }

        if (!empty($instructor->instructors_image)) {
            $imagePath = public_path('uploads/instructors/' . $instructor->instructors_image);
            if (file_exists($imagePath)) unlink($imagePath);
        }

        DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->delete();

        return redirect('all-instructors')->with('message', 'Xóa hướng dẫn viên thành công!');
    }
}
