<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class faqct extends Controller
{
 public function add_faqct(){
    $faqct = DB::table('faqct')->orderBy('id', 'desc')->get();
    return view('admin.add_faqct',compact('faqct'));
 }
public function save_faqct(Request $request) {
    // Validate input
    $request->validate([
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
    ]);

    // Prepare data
    $data = [
        'question' => $request->question,
        'answer' => $request->answer,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    // Insert into database
    DB::table('faqct')->insert($data);

    // Set success message and redirect
    Session::put('message', 'Thêm câu hỏi chi tiết thành công!');
    return Redirect::to('add-faqct');
}
public function all_faqct(){
    $all_faqct = DB::table('faqct')->orderBy('id','desc')->get();
    return view('admin.all_faqct',compact('all_faqct'));
}
public function edit_faqct($id) {
    $edit_value = DB::table('faqct')->where('id', $id)->first();
    if (!$edit_value) {
        Session::put('message', 'Không tìm thấy câu hỏi!');
        return Redirect::to('all-faqct');
    }
    return view('admin.edit_faqct', compact('edit_value'));
}
public function update_faqct(Request $request, $id) {
    $request->validate([
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
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
public function delete_faqct($id) {
    DB::table('faqct')->where('id', $id)->delete();

    Session::put('message', 'Xoá câu hỏi chi tiết thành công!');
    return Redirect::to('all-faqct');
}


}
