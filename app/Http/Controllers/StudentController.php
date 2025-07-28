<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function add_student(){
        $cate_product = DB::table('tbl_category_product')->orderBy('catgory_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
        return view('admin.add_student', compact('cate_product', 'brand_product','product'));
    }
     
public function save_student(Request $request)
{
    // Kiểm tra dữ liệu đầu vào
    $request->validate([
        'student_name' => 'required|string|max:255',
        'student_email' => 'required|email|unique:tbl_student,student_email',
        'student_phone' => 'required|string|max:20',
        'student_note' => 'nullable|string',
        'product' => 'required|exists:tbl_product,product_id',
        'student_status' => 'required|in:0,1',
    ]);

    // Chèn dữ liệu vào CSDL
    DB::table('tbl_student')->insert([
        'student_name' => $request->student_name,
        'student_email' => $request->student_email,
        'student_phone' => $request->student_phone,
        'student_note' => $request->student_note,
        'product_id' => $request->product,
        'student_status' => $request->student_status,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Gửi thông báo và chuyển hướng
    Session::put('message', 'Thêm học viên thành công!');
    return redirect()->back();

}
    public function all_student(){
        $all_student = DB::table('tbl_student')->join('tbl_product','tbl_product.product_id','=','tbl_student.product_id')
        ->orderBy('tbl_student.student_id','desc')->get();
        return view('admin.all_student',compact('all_student'));
    }
   public function edit_student($student_id){

        $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
        $edit_value = DB::table('tbl_student')->orderBy('student_id','desc')->get()->first();
        
        if (!$edit_value) {
            Session::put('message', 'Sản phẩm không tồn tại');
            return Redirect::to('all-student');
        }
        return view('admin.edit_student', compact('product', 'edit_value'));
   }
   public function update_student(Request $request, $student_id)
{
    // Validate dữ liệu đầu vào
    $request->validate([
        'student_name'  => 'required|string|max:255',
        'student_email' => 'required|email|max:255',
        'student_phone' => 'required|string|max:20',
        'student_note'  => 'nullable|string',
        'product'       => 'required|exists:tbl_product,product_id',
        'student_status'=> 'required|in:0,1',
    ]);

    // Tìm học viên theo ID
    $student = DB::table('tbl_student')->where('student_id', $student_id)->first();

    if (!$student) {
        return redirect()->back()->with('message', 'Không tìm thấy học viên!');
    }

    // Cập nhật thông tin
    DB::table('tbl_student')
        ->where('student_id', $student_id)
        ->update([
            'student_name'   => $request->student_name,
            'student_email'  => $request->student_email,
            'student_phone'  => $request->student_phone,
            'student_note'   => $request->student_note,
            'product_id'     => $request->product,
            'student_status' => $request->student_status,
            'updated_at'     => now(),
        ]);

    return redirect::to('all-student')->with('message', 'Cập nhật học viên thành công!');
}
public function delete_student($student_id)
    {
        $student = Student::find($student_id);
        if ($student) {
            $student->delete();
            Session::put('message', 'Xóa sản phẩm thành công');
        } else {
            Session::put('message', 'Sản phẩm không tồn tại');
        }

        return Redirect::to('all-student');
    }

}
