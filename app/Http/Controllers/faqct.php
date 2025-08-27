<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class faqct extends Controller
{
    // Hiển thị form thêm câu hỏi chi tiết
    public function add_faqct(){
        $faqct = DB::table('faqct')->orderBy('id', 'desc')->get();
        return view('admin.add_faqct', compact('faqct'));
    }

    // Lưu câu hỏi chi tiết
    public function save_faqct(Request $request) {
        // Validate input bằng tiếng Việt
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ], [
            'question.required' => 'Câu hỏi không được để trống.',
            'question.string' => 'Câu hỏi phải là chuỗi ký tự.',
            'question.max' => 'Câu hỏi không được vượt quá 255 ký tự.',
            'answer.required' => 'Câu trả lời không được để trống.',
            'answer.string' => 'Câu trả lời phải là chuỗi ký tự.',
        ]);

        // Chuẩn bị dữ liệu
        $data = [
            'question' => $request->question,
            'answer' => $request->answer,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Thêm vào database
        DB::table('faqct')->insert($data);

        // Thông báo thành công và chuyển hướng
        Session::put('message', 'Thêm câu hỏi chi tiết thành công!');
        return Redirect::to('add-faqct');
    }

    // Hiển thị tất cả câu hỏi chi tiết
    public function all_faqct(){
        $all_faqct = DB::table('faqct')->orderBy('id','desc')->get();
        return view('admin.all_faqct', compact('all_faqct'));
    }

    // Hiển thị form sửa câu hỏi chi tiết
    public function edit_faqct($id) {
        $edit_value = DB::table('faqct')->where('id', $id)->first();
        if (!$edit_value) {
            Session::put('message', 'Không tìm thấy câu hỏi!');
            return Redirect::to('all-faqct');
        }
        return view('admin.edit_faqct', compact('edit_value'));
    }

    // Cập nhật câu hỏi chi tiết
    public function update_faqct(Request $request, $id) {
        // Validate input bằng tiếng Việt
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ], [
            'question.required' => 'Câu hỏi không được để trống.',
            'question.string' => 'Câu hỏi phải là chuỗi ký tự.',
            'question.max' => 'Câu hỏi không được vượt quá 255 ký tự.',
            'answer.required' => 'Câu trả lời không được để trống.',
            'answer.string' => 'Câu trả lời phải là chuỗi ký tự.',
        ]);

        $data = [
            'question' => $request->question,
            'answer' => $request->answer,
            'updated_at' => now(),
        ];

        DB::table('faqct')->where('id', $id)->update($data);

        Session::put('message', 'Cập nhật câu hỏi chi tiết thành công!');
        return Redirect::to('all-faqct');
    }

    // Xoá câu hỏi chi tiết
    public function delete_faqct($id) {
        DB::table('faqct')->where('id', $id)->delete();

        Session::put('message', 'Xoá câu hỏi chi tiết thành công!');
        return Redirect::to('all-faqct');
    }
}
