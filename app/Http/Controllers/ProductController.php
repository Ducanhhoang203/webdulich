<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller
{
    public function add_product()
    {
        $cate_product = DB::table('tbl_category_product')->orderBy('catgory_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();

        return view('admin.add_product', compact('cate_product', 'brand_product'));
    }

    public function all_product()
    {
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();

        return view('admin.all_product', compact('all_product'));
    }

    public function save_product(Request $request)
    {
        $request->validate([
            'product_name'     => 'required|string|max:255',
            'product_content'  => 'required|string',
            'product_price'    => 'required|numeric|min:0',
            'product_desc'     => 'required|string',
            'product_status'   => 'required|in:0,1',
            'product_image'    => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'product_cate'     => 'required|exists:tbl_category_product,catgory_id',
            'product_brand'    => 'required|exists:tbl_brand,brand_id',
        ]);

        $data = [
            'product_name'    => $request->product_name,
            'product_content' => $request->product_content,
            'product_price'   => $request->product_price,
            'category_id'     => $request->product_cate,
            'brand_id'        => $request->product_brand,
            'product_desc'    => $request->product_desc,
            'product_status'  => $request->product_status,
            'created_at'      => now(),
            'updated_at'      => now(),
        ];

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $image_name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path('uploads/product');
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            $image->move($upload_path, $image_name);
            $data['product_image'] = $image_name;
        } else {
            $data['product_image'] = '';
        }

        DB::table('tbl_product')->insert($data);

        Session::put('message', 'Thêm sản phẩm thành công!');
        return Redirect::to('add-product');
    }

    public function edit_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->orderBy('catgory_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
        $edit_value = DB::table('tbl_product')->where('product_id', $product_id)->first();

        if (!$edit_value) {
            Session::put('message', 'Sản phẩm không tồn tại');
            return Redirect::to('all-product');
        }

        return view('admin.edit_product', compact('edit_value', 'cate_product', 'brand_product'));
    }

    public function update_product(Request $request, $product_id)
    {
        $request->validate([
            'product_name'     => 'required|string|max:255',
            'product_content'  => 'required|string',
            'product_price'    => 'required|numeric|min:0',
            'product_desc'     => 'required|string',
            'product_status'   => 'required|in:0,1',
            'product_image'    => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'product_cate'     => 'required|exists:tbl_category_product,catgory_id',
            'product_brand'    => 'required|exists:tbl_brand,brand_id',
        ]);

        $data = [
            'product_name'    => $request->product_name,
            'product_desc'    => $request->product_desc,
            'product_content' => $request->product_content,
            'product_price'   => $request->product_price,
            'product_status'  => $request->product_status,
            'category_id'     => $request->product_cate,
            'brand_id'        => $request->product_brand,
            'updated_at'      => now(),
        ];

        if ($request->hasFile('product_image')) {
            $get_image = $request->file('product_image');
            $new_image_name = time() . '_' . $get_image->getClientOriginalName();
            $get_image->move(public_path('uploads/product'), $new_image_name);
            $data['product_image'] = $new_image_name;
        }

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);

        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return Redirect::to('all-product');
    }

    public function delete_product($product_id)
    {
        $product = Product::find($product_id);
        if ($product) {
            $product->delete();
            Session::put('message', 'Xóa sản phẩm thành công');
        } else {
            Session::put('message', 'Sản phẩm không tồn tại');
        }

        return Redirect::to('all-product');
    }

  public function detail_product($product_id)
{
    // Lấy thông tin chính của sản phẩm
    $product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('tbl_product.product_id', $product_id)
       
        ->get();

    if (!$product) {
        Session::put('message', 'Không tìm thấy sản phẩm!');
        return Redirect::to('/');
    }

    // Lấy các chương trình giảng dạy
    $curriculums = DB::table('tbl_curriculums')
        ->where('product_id', $product_id)
        ->get();

    // Lấy giáo viên
    $instructors = DB::table('tbl_instructors')
        ->where('product_id', $product_id)
        ->get();

    // Lấy danh sách câu hỏi
    $faqs = DB::table('tbl_faqschitiet')
        ->where('product_id', $product_id)
        ->get();

    // Lấy đánh giá
    $reviews = DB::table('tbl_review')
        ->where('product_id', $product_id)
        ->get();
    $instructors3 = DB::table('tbl_instructors')
        ->where('product_id', $product_id)
        ->first();

    $title = "Trang Chi Tiết";
    return view('clients.chitietkhoahoc', compact('title', 'product', 'curriculums', 'instructors', 'faqs', 'reviews','instructors3'));
}





}
