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

    return view('clients.Home', compact('title'))
        ->with('category', $cate_product)
        ->with('brand', $brand_product)
        ->with('product', $all_product)
        ->with('new',$product_new)
        ->with('about',$about_sections)
        ->with('about1',$about_sections1)
        ->with('event',$event);


           
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
