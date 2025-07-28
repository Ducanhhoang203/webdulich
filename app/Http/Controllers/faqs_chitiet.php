<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class faqs_chitiet extends Controller
{
    public function add_faqs_chitiet()
    {
        $product = DB::table('tbl_product')
            ->orderBy('product_id', 'desc')
            ->get();

        return view('admin.add_faqs_chitiet', compact('product'));
    }

    public function save_faqs_chitiet(Request $request)
    {
        $request->validate([
            'faqs_chitiet_title' => 'required|string|max:255',
            'faqs_chitiet_cauhoi' => 'required|string|max:255',
            'faqs_chitiet_cautraloi' => 'required|string',
            'faqs_chitiet_status' => 'required|in:0,1',
            'product_id' => 'required|exists:tbl_product,product_id',
        ]);

        $data = [
            'faqs_chitiet_title' => $request->faqs_chitiet_title,
            'faqs_chitiet_cauhoi' => $request->faqs_chitiet_cauhoi,
            'faqs_chitiet_cautraloi' => $request->faqs_chitiet_cautraloi,
            'faqs_chitiet_status' => $request->faqs_chitiet_status,
            'product_id' => $request->product_id, // ✅ Đã sửa
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('tbl_faqschitiet')->insert($data);

        Session::put('message', 'Thêm câu hỏi chi tiết thành công!');
        return Redirect::to('add-faqs-chitiet');
    }
    public function all_faqs_chitiet(){ 
      $faqs_chitiet = DB::table('tbl_faqschitiet')
            ->join('tbl_product','tbl_faqschitiet.product_id','=','tbl_product.product_id')
            ->orderBy('faqs_chitiet_id', 'desc')
            ->get();
       return view('admin.all_faqs_chitiet', compact('faqs_chitiet'));
    }
   public function edit_faqs_chitiet($faqs_chitiet_id)
    {
        $product = DB::table('tbl_product')->orderBy('product_id', 'desc')->get();
        $edit_value = DB::table('tbl_faqschitiet')->where('faqs_chitiet_id', $faqs_chitiet_id)->first();

        if (!$edit_value) {
            Session::put('message', 'câu hỏi không tồn tại');
            return Redirect::to('all-faqs-chitiet');
        }

        return view('admin.edit_faqs_chitiet', compact('product', 'edit_value'));
    }
    public function update_faqs_chitiet(Request $request, $faqs_chitiet_id)
{
    $request->validate([
        'faqs_chitiet_title' => 'required|string|max:255',
        'faqs_chitiet_cauhoi' => 'required|string|max:255',
        'faqs_chitiet_cautraloi' => 'required|string',
        'faqs_chitiet_status' => 'required|in:0,1',
        'product_id' => 'required|exists:tbl_product,product_id',
    ]);

    $data = [
        'faqs_chitiet_title' => $request->faqs_chitiet_title,
        'faqs_chitiet_cauhoi' => $request->faqs_chitiet_cauhoi,
        'faqs_chitiet_cautraloi' => $request->faqs_chitiet_cautraloi,
        'faqs_chitiet_status' => $request->faqs_chitiet_status,
        'product_id' => $request->product_id,
        'updated_at' => now(),
    ];

    $updated = DB::table('tbl_faqschitiet')
        ->where('faqs_chitiet_id', $faqs_chitiet_id)
        ->update($data);

    if ($updated) {
        Session::put('message', 'Cập nhật câu hỏi chi tiết thành công!');
    } else {
        Session::put('message', 'Không có thay đổi hoặc lỗi xảy ra khi cập nhật!');
    }

    return Redirect::to('all-faqs-chitiet');
}
public function delete_faqs_chitiet($faqs_chitiet_id)
{
    $deleted = DB::table('tbl_faqschitiet')
        ->where('faqs_chitiet_id', $faqs_chitiet_id)
        ->delete();

    if ($deleted) {
        Session::put('message', 'Xóa câu hỏi chi tiết thành công!');
    } else {
        Session::put('message', 'Không tìm thấy câu hỏi để xóa hoặc lỗi xảy ra!');
    }

    return Redirect::to('all-faqs-chitiet');
}



}
