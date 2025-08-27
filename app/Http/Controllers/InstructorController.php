<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
        // Validate tất cả trường bắt buộc
        $request->validate([
            'instructors_name'   => 'required|string|max:255',
            'instructors_bio'    => 'required|string|max:255',
            'instructors_image'  => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'product_cate'       => 'required|exists:tbl_product,product_id',
        ], [
            'instructors_name.required'   => 'Tên giảng viên không được để trống.',
            'instructors_name.max'        => 'Tên giảng viên không được vượt quá 255 ký tự.',
            'instructors_bio.required'    => 'Tiểu sử giảng viên không được để trống.',
            'instructors_bio.max'         => 'Tiểu sử giảng viên không được vượt quá 255 ký tự.',
            'instructors_image.required'  => 'Bạn phải chọn hình ảnh giảng viên.',
            'instructors_image.image'     => 'File tải lên phải là hình ảnh.',
            'instructors_image.mimes'     => 'Hình ảnh phải có định dạng jpg, jpeg, png, gif.',
            'instructors_image.max'       => 'Hình ảnh không được lớn hơn 2MB.',
            'product_cate.required'       => 'Bạn phải chọn khóa học.',
            'product_cate.exists'         => 'Khóa học chọn không tồn tại.',
        ]);

        // Upload ảnh
        $image = $request->file('instructors_image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $uploadPath = public_path('uploads/instructors');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        $image->move($uploadPath, $imageName);

        // Lưu vào database
        DB::table('tbl_instructors')->insert([
            'instructors_name' => $request->instructors_name,
            'instructors_bio'  => $request->instructors_bio,
            'product_id'       => $request->product_cate,
            'instructors_image'=> $imageName,
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        return redirect('add-instructors')->with('message', 'Thêm giảng viên thành công!');
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
            return redirect('all-instructors')->with('message', 'Giảng viên không tồn tại');
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
        ], [
            'instructors_name.required'   => 'Tên giảng viên không được để trống.',
            'instructors_name.max'        => 'Tên giảng viên không được vượt quá 255 ký tự.',
            'instructors_bio.required'    => 'Tiểu sử giảng viên không được để trống.',
            'instructors_bio.max'         => 'Tiểu sử giảng viên không được vượt quá 255 ký tự.',
            'instructors_image.image'     => 'File tải lên phải là hình ảnh.',
            'instructors_image.mimes'     => 'Hình ảnh phải có định dạng jpg, jpeg, png, gif.',
            'instructors_image.max'       => 'Hình ảnh không được lớn hơn 2MB.',
            'product_cate.required'       => 'Bạn phải chọn khóa học.',
            'product_cate.exists'         => 'Khóa học chọn không tồn tại.',
        ]);

        $instructor = DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->first();

        if (!$instructor) {
            return redirect()->back()->with('message', 'Không tìm thấy giảng viên!');
        }

        $data = [
            'instructors_name' => $request->instructors_name,
            'instructors_bio'  => $request->instructors_bio,
            'product_id'       => $request->product_cate,
            'updated_at'       => now(),
        ];

        // Nếu upload ảnh mới
        if ($request->hasFile('instructors_image')) {
            $image = $request->file('instructors_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/instructors');

            if (!file_exists($uploadPath)) mkdir($uploadPath, 0755, true);
            $image->move($uploadPath, $imageName);

            // Xóa ảnh cũ nếu có
            if (!empty($instructor->instructors_image)) {
                $oldImagePath = $uploadPath . '/' . $instructor->instructors_image;
                if (file_exists($oldImagePath)) unlink($oldImagePath);
            }

            $data['instructors_image'] = $imageName;
        }

        DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->update($data);

        return redirect('all-instructors')->with('message', 'Cập nhật giảng viên thành công!');
    }

    // Xóa giảng viên
    public function delete_instructors($instructors_id)
    {
        $instructor = DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->first();

        if (!$instructor) {
            return redirect('all-instructors')->with('message', 'Không tìm thấy giảng viên!');
        }

        if (!empty($instructor->instructors_image)) {
            $imagePath = public_path('uploads/instructors/' . $instructor->instructors_image);
            if (file_exists($imagePath)) unlink($imagePath);
        }

        DB::table('tbl_instructors')->where('instructors_id', $instructors_id)->delete();

        return redirect('all-instructors')->with('message', 'Xóa giảng viên thành công!');
    }
}
