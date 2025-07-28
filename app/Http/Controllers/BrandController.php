<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\BrandProduct;

class BrandController extends Controller
{
    public function add_brand_product()
    {
        return view('admin.add_brand_product');
    }

    // Hiển thị danh sách tất cả danh mục
    public function all_brand_product()
    {
        $all_category_product = DB::table('tbl_brand')->get();

        return view('admin.all_brand_product')
            ->with('all_brand_product', $all_category_product);
    }

    // Lưu danh mục vào DB
    public function save_brand_product(Request $request)
    {
          $request->validate([
        'brand_product_name' => 'required|string|max:255',
        'brand_product_desc' => 'required|string',
        'brand_product_status' => 'required|in:0,1',
    ]);


        $data = [];
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

        DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Thêm Khóa học sản phẩm thành công');

        return Redirect::to('add-brand-product');
    }

    // Hiển thị form sửa danh mục
   public function edit_brand_product($brand_product_id)
{
    $edit_value = DB::table('tbl_brand')->where('brand_id', $brand_product_id)->first();
    return view('admin.edit_brand_product')->with('edit_value', $edit_value);
}

public function update_brand_product(Request $request, $brand_product_id)
{
    $data = array();
    $data['brand_name'] = $request->brand_product_name;
    $data['brand_desc'] = $request->brand_product_desc;
    $data['brand_status'] = $request->brand_product_status;

    DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update($data);
    Session::put('message', 'Cập nhật khóa hoc thành công');
    return Redirect::to('all-brand-product');
}


    // Xóa danh mục
    public function delete_brand_product($brand_id)
    {
        BrandProduct::find($brand_id)->delete();
        Session::put('message', 'Xóa khóa học thành công');
        return Redirect::to('all-brand-product');
    }
    public function showcategory_brand($brand_id) {
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
    $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
        ->where('tbl_product.brand_id', $brand_id)
        ->where('tbl_product.product_status', 1) // nếu có cột trạng thái
        ->select('tbl_product.*') // nếu cần lấy riêng product
        ->get();

    $title = 'Danh mục';

    return view('clients.aboutkhoahoc')
        ->with('category', $cate_product)
        ->with('brand_product', $brand_product)
        ->with('title', $title)
        ->with('brand_by_id', $brand_by_id);
}
}
