<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function add_product()
    {
        $cate_product = DB::table('tbl_category_product')->orderBy('catgory_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();

        return view('admin.add_product', compact('cate_product', 'brand_product'));
    }

  public function all_product(Request $request)
{
    $query = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->select('tbl_product.*', 'tbl_category_product.catgory_name', 'tbl_brand.brand_name');

    // Tìm kiếm theo tên tour
    if (!empty($request->keyword)) {
        $query->where('tbl_product.product_name', 'like', '%' . $request->keyword . '%');
    }

    // Lọc theo loại tour (category)
    if (!empty($request->category)) {
        $query->where('tbl_product.category_id', $request->category);
    }

    // Lọc theo nhà cung cấp (brand)
    if (!empty($request->brand)) {
        $query->where('tbl_product.brand_id', $request->brand);
    }

    // Sắp xếp theo product_id giảm dần
    $all_product = $query->orderBy('tbl_product.product_id', 'desc')->get();

    // Lấy danh sách category và brand để hiển thị dropdown lọc
    $all_categories = DB::table('tbl_category_product')->get();
    $all_brands = DB::table('tbl_brand')->get();

    return view('admin.all_product', compact('all_product', 'all_categories', 'all_brands'));
}


    public function save_product(Request $request)
    {
        $messages = [
            'required' => ':attribute không được để trống',
            'string'   => ':attribute phải là chuỗi ký tự',
            'numeric'  => ':attribute phải là số',
            'min'      => ':attribute phải lớn hơn hoặc bằng :min',
            'image'    => ':attribute phải là ảnh hợp lệ',
            'mimes'    => ':attribute phải có định dạng: :values',
            'exists'   => ':attribute không tồn tại trong hệ thống',
            'in'       => ':attribute phải là giá trị hợp lệ',
            'max'      => ':attribute không được vượt quá :max ký tự',
        ];

        $attributes = [
            'product_name'    => 'Tên sản phẩm',
            'product_content' => 'Nội dung sản phẩm',
            'product_price'   => 'Giá sản phẩm',
            'product_desc'    => 'Mô tả sản phẩm',
            'product_status'  => 'Trạng thái sản phẩm',
            'product_image'   => 'Ảnh sản phẩm',
            'product_cate'    => 'Danh mục sản phẩm',
            'product_brand'   => 'Loại Hình Tour sản phẩm',
        ];

        $request->validate([
            'product_name'    => 'required|string|max:255',
            'product_content' => 'required|string',
            'product_price'   => 'required|numeric|min:0',
            'product_desc'    => 'required|string',
            'product_status'  => 'required|in:0,1',
            'product_image'   => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'product_cate'    => 'required|exists:tbl_category_product,catgory_id',
            'product_brand'   => 'required|exists:tbl_brand,brand_id',
        ], $messages, $attributes);

        $data = [
            'product_name'    => $request->product_name,
            'product_content' => $request->product_content,
            'product_price'   => $request->product_price,
            'category_id'     => $request->product_cate,
            'brand_id'        => $request->product_brand,
            'product_desc'    => $request->product_desc,
            'product_status'  => $request->product_status,
            'slug'            => Str::slug($request->product_name, '-'),
            'created_at'      => now(),
            'updated_at'      => now(),
        ];

        // Xử lý ảnh
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $image_name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path('uploads/product');
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            $image->move($upload_path, $image_name);
            $data['product_image'] = $image_name;
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
        $messages = [
            'required' => ':attribute không được để trống',
            'string'   => ':attribute phải là chuỗi ký tự',
            'numeric'  => ':attribute phải là số',
            'min'      => ':attribute phải lớn hơn hoặc bằng :min',
            'image'    => ':attribute phải là ảnh hợp lệ',
            'mimes'    => ':attribute phải có định dạng: :values',
            'exists'   => ':attribute không tồn tại trong hệ thống',
            'in'       => ':attribute phải là giá trị hợp lệ',
            'max'      => ':attribute không được vượt quá :max ký tự',
        ];

        $attributes = [
            'product_name'    => 'Tên sản phẩm',
            'product_content' => 'Nội dung sản phẩm',
            'product_price'   => 'Giá sản phẩm',
            'product_desc'    => 'Mô tả sản phẩm',
            'product_status'  => 'Trạng thái sản phẩm',
            'product_image'   => 'Ảnh sản phẩm',
            'product_cate'    => 'Danh mục sản phẩm',
            'product_brand'   => 'Loại Hình Tour sản phẩm',
        ];

        $request->validate([
            'product_name'    => 'required|string|max:255',
            'product_content' => 'required|string',
            'product_price'   => 'required|numeric|min:0',
            'product_desc'    => 'required|string',
            'product_status'  => 'required|in:0,1',
            'product_image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'product_cate'    => 'required|exists:tbl_category_product,catgory_id',
            'product_brand'   => 'required|exists:tbl_brand,brand_id',
        ], $messages, $attributes);

        $data = [
            'product_name'    => $request->product_name,
            'product_desc'    => $request->product_desc,
            'product_content' => $request->product_content,
            'product_price'   => $request->product_price,
            'product_status'  => $request->product_status,
            'category_id'     => $request->product_cate,
            'brand_id'        => $request->product_brand,
            'slug'            => Str::slug($request->product_name, '-'),
            'updated_at'      => now(),
        ];

        // Nếu có ảnh mới thì cập nhật
        if ($request->hasFile('product_image')) {
            $get_image = $request->file('product_image');
            $new_image_name = time() . '_' . uniqid() . '.' . $get_image->getClientOriginalExtension();
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
    $product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('tbl_product.product_id', $product_id)
        ->first();

    if (!$product) {
        Session::put('message', 'Không tìm thấy sản phẩm!');
        return Redirect::to('/');
    }

    $curriculums = DB::table('tbl_curriculums')->where('product_id', $product_id)->get();
    $instructors = DB::table('tbl_instructors')->where('product_id', $product_id)->get();
    $faqs = DB::table('tbl_faqschitiet')->where('product_id', $product_id)->get();
    $reviews = DB::table('reviews')
        ->where('product_id', $product_id)
        ->orderBy('id', 'desc')
        ->get();

    $instructors3 = DB::table('tbl_instructors')->where('product_id', $product_id)->first();

    $title = "Trang Chi Tiết";

    // $product2 có thể chính là $product
    $product2 = $product;
Session::put('url.intended', url()->current());

    return view('clients.tour-detail', compact(
        'title',
        'product',
        'curriculums',
        'instructors',
        'faqs',
        'reviews',
        'instructors3',
        'product2'
    ));
}


    public function search(Request $request)
    {
        $query = Product::query();

        if ($request->keyword) {
            $query->where('product_name', 'LIKE', '%' . $request->keyword . '%');
        }

        if ($request->category_id) {
            $query->where('catgory_id', $request->catgory_id);
        }

        $products = $query->where('product_status', 1)->get();

        return view('pages.product_search', compact('products'));
    }
}
