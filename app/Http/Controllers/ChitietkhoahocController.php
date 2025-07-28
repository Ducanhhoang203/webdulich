<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Curriculums;

class ChitietkhoahocController extends Controller
{
public function index(){
    $title = 'trang chi tiet';
     
    return view('clients.chitietkhoahoc',compact('title'));
 }

public function add_chitietkhoahoc(){
 
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();

        return view('admin.add_chitietkhoahoc', compact('product'));
}
public function save_chitietkhoahoc(Request $request){
   $request->validate([
    'curriculums_title'  => 'required|string|max:255',
    'curriculums_content' => 'required|string|max:65535',
    'product'=> 'required|exists:tbl_product,product_id',
]);

   DB::table('tbl_curriculums')->insert([
    'product_id' =>$request->product,
    'curriculums_title'=>$request->curriculums_title,
    'curriculums_content'=>$request->curriculums_content,
     'created_at' => now(),
        'updated_at' => now(),
   ]);
       Session::put('message', 'Thêm học viên thành công!');
    return redirect()->back();
   

}
 public function all_chitietkhoahoc(){
    $all_chitiet = DB::table('tbl_curriculums')
        ->join('tbl_product', 'tbl_curriculums.product_id', '=', 'tbl_product.product_id')
        ->orderBy('tbl_curriculums.curriculums_id', 'desc')
        ->get();

    return view('admin.all_chitietkhoahoc', compact('all_chitiet'));
}
public function edit_chitietkhoahoc($curriculums_id){
    $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
        $edit_value = DB::table('tbl_curriculums')->orderBy('curriculums_id','desc')->get()->first();
        
        if (!$edit_value) {
            Session::put('message', 'Sản phẩm không tồn tại');
            return Redirect::to('all-chitietkhoahoc');
        }
        return view('admin.edit_chitietkhoa', compact('product', 'edit_value'));
}
public function update_chitietkhoahoc(Request $request , $curriculums_id){
   // validate dữ liệu đầu vào 
  $request->validate([
    'curriculums_title'  => 'required|string|max:255',
    'curriculums_content' => 'required|string|max:65535',
    'product'=> 'required|exists:tbl_product,product_id',
]);

    $curriculums = DB::table('tbl_curriculums')->where('curriculums_id', $curriculums_id)->first();

    if (!$curriculums) {
        return redirect()->back()->with('message', 'Không tìm thấy học viên!');
    }

    // Cập nhật thông tin
    DB::table('tbl_curriculums')
        ->where('curriculums_id', $curriculums_id)
        ->update([
            'curriculums_title'   => $request->curriculums_title,
            'curriculums_content'  => $request->curriculums_content,
            'product_id'     => $request->product,
            'updated_at'     => now(),
        ]);

    return redirect::to('all-chitietkhoahoc')->with('message', 'Cập nhật học viên thành công!');

}
public function delete_chitietkhoahoc($curriculums_id)
    {
        $curriculums = Curriculums::find($curriculums_id);
        if ($curriculums) {
            $curriculums->delete();
            Session::put('message', 'Xóa thành công');
        } else {
            Session::put('message', ' không tồn tại');
        }

        return Redirect::to('all-chitietkhoahoc');
    }
}
