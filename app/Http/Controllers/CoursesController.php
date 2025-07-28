<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\CategoryProduct; //

class CoursesController extends Controller
{
    public function add_courses(){
        
        $all_product = DB::table('tbl_product')->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('product_status', 1) // Cũng sửa lại đúng điều kiện
        ->orderBy('product_id', 'desc')
        ->get();
        $title ='Khóa Học';
        return view('clients.courses', compact('title','all_product'));
    }

 
}
