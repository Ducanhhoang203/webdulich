<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Baivietcontroller extends Controller
{
 public function add_baiviet(){
 $cate_product = DB::table('tbl_category_product')->orderBy('catgory_id', 'desc')->get();
 $baiviet = DB::table('posts')->orderBy('id','desc')->get();
 return view('admin.add_baiviet',compact('cate_product','baiviet'));

 }

public function save_baiviet(Request $request)
{
    // Validate
    $request->validate([
        'Baiviet_title' => 'required|string|max:255',
        'Baiviet_slug' => 'nullable|string|max:255',
        'Baiviet_content' => 'nullable|string',
        'Baiviet_excerpt' => 'nullable|string',
        'Baiviet_category' => 'required|integer',
        'Baiviet_author' => 'nullable|string|max:100',
        'Baiviet_status' => 'required|in:0,1',
        'Baiviet_image_main' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'Baiviet_image_extra1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'Baiviet_image_extra2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Tạo thư mục upload nếu chưa có
    $upload_path = public_path('uploads/posts');
    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    // Xử lý ảnh chính
    $image_main_name = '';
    if ($request->hasFile('Baiviet_image_main')) {
        $image = $request->file('Baiviet_image_main');
        $image_main_name = time() . '_main_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($upload_path, $image_main_name);
    }

    // Ảnh phụ 1
    $image_extra1_name = '';
    if ($request->hasFile('Baiviet_image_extra1')) {
        $image = $request->file('Baiviet_image_extra1');
        $image_extra1_name = time() . '_extra1_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($upload_path, $image_extra1_name);
    }

    // Ảnh phụ 2
    $image_extra2_name = '';
    if ($request->hasFile('Baiviet_image_extra2')) {
        $image = $request->file('Baiviet_image_extra2');
        $image_extra2_name = time() . '_extra2_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($upload_path, $image_extra2_name);
    }

    // Chuẩn bị dữ liệu
    $data = [
        'Baiviet_title' => $request->Baiviet_title,
        'Baiviet_slug' => $request->Baiviet_slug,
        'Baiviet_content' => $request->Baiviet_content,
        'Baiviet_excerpt' => $request->Baiviet_excerpt,
        'Baiviet_category' => $request->Baiviet_category,
        'Baiviet_image_main' => $image_main_name,
        'Baiviet_image_extra1' => $image_extra1_name,
        'Baiviet_image_extra2' => $image_extra2_name,
        'Baiviet_author' => $request->Baiviet_author,
        'Baiviet_status' => $request->Baiviet_status,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    // Lưu vào database
    DB::table('posts')->insert($data);

    return redirect()->back()->with('success', 'Thêm bài viết thành công!');
}




 public function all_baiviet(){ 
    $all_posts = DB::table('posts')->join('tbl_category_product','tbl_category_product.catgory_id','=','posts.Baiviet_category')
    ->orderBy('id','desc')
    ->get();
    return view('admin.all_baiviet',compact('all_posts'));
 }
 public function edit_baiviet($id)
{
    $edit_value = DB::table('posts')->where('id', $id)->first();
    $cate_product = DB::table('tbl_category_product')->orderBy('catgory_id', 'desc')->get();

    if (!$edit_value) {
        return redirect()->back()->with('error', 'Bài viết không tồn tại!');
    }

    return view('admin.edit_baiviet', compact('edit_value', 'cate_product'));
}
public function upload_baiviet(Request $request, $id)
{
    // Validate
    $request->validate([
        'Baiviet_title' => 'required|string|max:255',
        'Baiviet_slug' => 'nullable|string|max:255',
        'Baiviet_content' => 'nullable|string',
        'Baiviet_excerpt' => 'nullable|string',
        'Baiviet_category' => 'required|integer',
        'Baiviet_author' => 'nullable|string|max:100',
        'Baiviet_status' => 'required|in:0,1',
        'Baiviet_image_main' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'Baiviet_image_extra1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'Baiviet_image_extra2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $upload_path = public_path('uploads/posts');
    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    // Lấy dữ liệu bài viết hiện tại
    $baiviet = DB::table('posts')->where('id', $id)->first();

    if (!$baiviet) {
        return redirect()->back()->with('error', 'Bài viết không tồn tại!');
    }

    // Xử lý ảnh nếu có upload mới
    $image_main_name = $baiviet->Baiviet_image_main;
    $image_extra1_name = $baiviet->Baiviet_image_extra1;
    $image_extra2_name = $baiviet->Baiviet_image_extra2;

    if ($request->hasFile('Baiviet_image_main')) {
        $image = $request->file('Baiviet_image_main');
        $image_main_name = time() . '_main_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($upload_path, $image_main_name);
    }

    if ($request->hasFile('Baiviet_image_extra1')) {
        $image = $request->file('Baiviet_image_extra1');
        $image_extra1_name = time() . '_extra1_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($upload_path, $image_extra1_name);
    }

    if ($request->hasFile('Baiviet_image_extra2')) {
        $image = $request->file('Baiviet_image_extra2');
        $image_extra2_name = time() . '_extra2_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($upload_path, $image_extra2_name);
    }

    $data = [
        'Baiviet_title' => $request->Baiviet_title,
        'Baiviet_slug' => $request->Baiviet_slug,
        'Baiviet_content' => $request->Baiviet_content,
        'Baiviet_excerpt' => $request->Baiviet_excerpt,
        'Baiviet_category' => $request->Baiviet_category,
        'Baiviet_image_main' => $image_main_name,
        'Baiviet_image_extra1' => $image_extra1_name,
        'Baiviet_image_extra2' => $image_extra2_name,
        'Baiviet_author' => $request->Baiviet_author,
        'Baiviet_status' => $request->Baiviet_status,
        'updated_at' => now(),
    ];

    DB::table('posts')->where('id', $id)->update($data);

    return redirect()->route('all.baiviet')->with('success', 'Cập nhật bài viết thành công!');
}
public function delete_baiviet($id)
{
    $baiviet = DB::table('posts')->where('id', $id)->first();

    if (!$baiviet) {
        return redirect()->back()->with('error', 'Bài viết không tồn tại!');
    }

    // Xoá file ảnh nếu có
    $image_fields = ['Baiviet_image_main', 'Baiviet_image_extra1', 'Baiviet_image_extra2'];
    foreach ($image_fields as $field) {
        if (!empty($baiviet->$field)) {
            $file_path = public_path('uploads/posts/' . $baiviet->$field);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    DB::table('posts')->where('id', $id)->delete();

    return redirect()->back()->with('success', 'Xoá bài viết thành công!');
}

public function chitietbaiviet($id){
$title = "Trang bài viết chi tiết ";
 $baiviet =DB::table('posts') ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'posts.Baiviet_category')
 ->where('posts.id',$id)
 ->first();
 $product = DB::table('tbl_product')
    ->where('product_status', 1)
    ->orderBy('product_id', 'desc') // sắp xếp sản phẩm mới nhất
    ->limit(3)                      // lấy 3 sản phẩm đầu tiên
    ->get();
 return view('clients.blogsider',compact('baiviet', 'title', 'product'));
}

}
