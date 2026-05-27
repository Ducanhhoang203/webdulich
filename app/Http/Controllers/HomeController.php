<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use  App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $cate_product = DB::table('tbl_category_product')
        ->where('catgory_status', 1)
        ->orderBy('catgory_id', 'desc')
        ->get();

    $brand_product = DB::table('tbl_brand')
        ->where('brand_status', 1)
        ->orderBy('brand_id', 'desc')
        ->get();

    $title = "Trang Home";

    $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('product_status', 1)
        ->orderBy('tbl_product.product_id', 'desc')
      
        ->get();
        
    $product_new = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('product_status', 1)
        ->orderBy('tbl_product.product_id', 'desc')
        ->limit(3)
        ->get();
    $about_sections1 = DB::table('about_sections')
    ->orderBy('id','desc')
    ->first();
    $about_sections = DB::table('about_sections')->orderBy('id', 'desc')->get();

    $event = DB::table('tbl_event')->orderBy('id','desc')->limit(7)->get();
   $topProducts = Product::with('wishlists')
    ->withCount('wishlists')
    ->whereHas('wishlists') // chỉ lấy sản phẩm có ít nhất 1 lượt yêu thích
    ->orderByDesc('wishlists_count')
    ->take(8)
    ->get();
    $posts = DB::table('posts')->orderBy('id','desc')->limit(3)->get();
     $product_new2 = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('product_status', 1)
        ->orderBy('tbl_product.product_id', 'desc')
        ->limit(6)
        ->get();



    return view('clients.Home', compact('title'))
        ->with('category', $cate_product)
        ->with('brand', $brand_product)
        ->with('product', $all_product)
        ->with('new',$product_new)
        ->with('about',$about_sections)
        ->with('about1',$about_sections1)
        ->with('event',$event)
        ->with('topProducts',$topProducts)
        ->with('posts',$posts)
        ->with('product_new2',$product_new2);


           
}
public function search(Request $request)
{
    $query = DB::table('tbl_product');

    // Lọc theo tên
    if ($request->filled('product_name')) {
        $query->where('product_name', 'like', '%' . $request->product_name . '%');
    }

    // Lọc theo giá
    if ($request->filled('product_price')) {
        $query->where('product_price', '<=', $request->product_price);
    }

    // Lọc theo danh mục
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    // Lọc theo trạng thái
    if ($request->filled('product_status')) {
        $query->where('product_status', $request->product_status);
    }

    $products = $query->get();
    

    // Lấy danh mục để hiển thị lại trên form
    $categories = DB::table('tbl_category_product')->get();
      $title = "Kết quả tìm kiếm";
    return view('page.product_search', compact('products', 'categories', 'title'));

}
  



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
