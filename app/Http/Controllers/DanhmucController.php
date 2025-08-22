<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\CategoryProduct; // Dùng model để sửa, xóa, cập nhật

class DanhmucController extends Controller
{
    // Hiển thị form thêm danh mục
    public function add_cartegory_product()
    {
        return view('admin.add_cartegory_product');
    }

    // Hiển thị danh sách tất cả danh mục
    public function all_cartegory_product()
    {
        $all_category_product = DB::table('tbl_category_product')->get();

        return view('admin.all_cartegory_product')
            ->with('all_category_product', $all_category_product);
    }

    // Lưu danh mục vào DB
    public function save_cartegory_product(Request $request)
    {
          $request->validate([
        'cartegory_product_name'   => 'required|string|max:255',
        'cartegory_product_desc'   => 'required|string',
        'cartegory_product_status' => 'required|in:1,0'
    ]);
        $data = [];
        $data['catgory_name'] = $request->cartegory_product_name;
        $data['catgory_desc'] = $request->cartegory_product_desc;
        $data['catgory_status'] = $request->cartegory_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');

        return Redirect::to('add-cartegory-product');
    }

    // Hiển thị form sửa danh mục
   public function edit_cartegory_product($category_product_id)
{
    $edit_value = DB::table('tbl_category_product')->where('catgory_id', $category_product_id)->first();
    return view('admin.edit_cartegory_product')->with('edit_value', $edit_value);
}

public function update_cartegory_product(Request $request, $category_product_id)
{
    $data = array();
    $data['catgory_name'] = $request->cartegory_product_name;
    $data['catgory_desc'] = $request->cartegory_product_desc;
    $data['catgory_status'] = $request->category_product_status;

    DB::table('tbl_category_product')->where('catgory_id', $category_product_id)->update($data);
    Session::put('message', 'Cập nhật danh mục thành công');
    return Redirect::to('all-cartegory-product');
}


    // Xóa danh mục
    public function delete_cartegory_product($category_product_id)
    {
        CategoryProduct::find($category_product_id)->delete();
        Session::put('message', 'Xóa danh mục thành công');
        return Redirect::to('all-cartegory-product');
    }
public function showcategory_about($category_id) {
    $product = DB::table('tbl_product')
    ->where('product_status',1)
    ->orderBy('product_id','desc')
    ->get();
    // Danh mục (chỉ hiển thị danh mục đang bật)
    $cate_product = DB::table('tbl_category_product')
        ->where('catgory_status', 1)
        ->orderBy('catgory_id', 'desc')
        ->get();

    // Thương hiệu (chỉ hiển thị thương hiệu đang bật)
    $brand_product = DB::table('tbl_brand')
        ->where('brand_status', 1)
        ->orderBy('brand_id', 'desc')
        ->get();

    // Lấy danh sách sản phẩm theo danh mục
    $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.catgory_id')
        ->where('tbl_product.category_id', $category_id)
        ->where('tbl_product.product_status', 1) // nếu có cột trạng thái
        ->select('tbl_product.*') // nếu cần lấy riêng product
        ->get();

    $title = 'Danh mục';

    return view('clients.aboutdanhmuc')
        ->with('category', $cate_product)
        ->with('brand_product', $brand_product)
        ->with('title', $title)
        ->with('category_by_id', $category_by_id)
        ->with('product',$product);
        
}

}
