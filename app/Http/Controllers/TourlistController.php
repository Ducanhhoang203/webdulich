<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TourlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $category = DB::table('tbl_category_product')
        ->where('catgory_status', '1')
        ->orderby('catgory_id', 'desc')
        ->get();
    $title = "Danh sách tour";

    // Lấy tham số từ URL
    $sort = $request->sort;          // asc | desc
    $min_price = $request->min_price;
    $max_price = $request->max_price;
    $category_id = $request->category;

    // Query sản phẩm
    $query = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('product_status', 1);

    // ===== Sắp xếp theo giá =====
    if ($sort == 'asc') {
        $query->orderBy('tbl_product.product_price', 'asc');
    } elseif ($sort == 'desc') {
        $query->orderBy('tbl_product.product_price', 'desc');
    } else {
        $query->orderBy('tbl_product.product_id', 'desc');
    }

    // ===== Lọc theo khoảng giá =====
    if ($min_price && $max_price) {
        $query->whereBetween('tbl_product.product_price', [$min_price, $max_price]);
    }

    // ===== Lọc theo category =====
    if ($category_id) {
        $query->where('tbl_product.category_id', $category_id);
    }

    // Lấy danh sách sản phẩm
    $product_new = $query->paginate(6);


    // Đếm sản phẩm
    $total = $product_new->count();

    return view('clients.tourlist', compact('title', 'total', 'product_new', 'category'));
}


}
