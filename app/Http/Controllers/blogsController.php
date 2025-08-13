<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm (blogs).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Trang Blogs";

        // Lấy danh mục sản phẩm đang hoạt động
        $category = DB::table('tbl_category_product')
            ->where('catgory_status', 1)
            ->orderBy('catgory_id', 'desc')
            ->get();

        // Lấy danh sách sản phẩm kèm tên danh mục
        $products = DB::table('tbl_product')
            ->select('tbl_product.*', 'tbl_category_product.catgory_name')
            ->leftJoin('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.catgory_id')
            ->orderBy('product_id', 'desc')
            ->paginate(6);

        return view('clients.blogs', compact('title', 'products', 'category'));
    }

    /**
     * Xử lý tìm kiếm sản phẩm theo từ khóa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
{
    $keyword = $request->input('keyword');

    // Tìm kiếm có phân trang
    $products = DB::table('tbl_product')
        ->select('tbl_product.*', 'tbl_category_product.catgory_name')
        ->leftJoin('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.catgory_id')
        ->where('product_name', 'LIKE', '%' . $keyword . '%')
        ->orderBy('product_id', 'desc')
        ->paginate(6);

    $title = "Kết quả tìm kiếm cho: " . $keyword;

    $category = DB::table('tbl_category_product')
        ->where('catgory_status', 1)
        ->orderBy('catgory_id', 'desc')
        ->get();

    return view('clients.blogs', compact('title', 'products', 'category', 'keyword'));
}
    // Các hàm CRUD mặc định không sử dụng đến có thể để trống
    public function create() {}
    public function store(Request $request) {}
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
    public function searchSuggest(Request $request)
{
    $keyword = $request->input('query');

    $results = DB::table('tbl_product')
        ->where('product_name', 'LIKE', '%' . $keyword . '%')
        ->limit(5)
        ->get();

    $suggestions = [];

    foreach ($results as $item) {
        $suggestions[] = [
            'id' => $item->product_id,
            'name' => $item->product_name,
        ];
    }

    return response()->json($suggestions);
}

}

