<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function add_courses()
    {
        // Lấy sản phẩm và phân trang (mỗi trang 6 sản phẩm)
        $all_product = DB::table('tbl_product')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('product_status', 1)
            ->orderBy('product_id', 'desc')
            ->paginate(6); // <- Sửa ở đây

        $title = 'Khóa Học';

        // Trả về view
        return view('clients.courses', compact('title', 'all_product'));
    }
}
