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
        ->where('catgory_status', 1) // Sửa đúng điều kiện
        ->orderBy('catgory_id', 'desc')
        ->get();
        $brand_product = DB::table('tbl_brand')
        ->where('brand_status', 1) // Cũng sửa lại đúng điều kiện
        ->orderBy('brand_id', 'desc')
        ->get();

    $title = "Trang About";
    // $all_product = DB::table('tbl_product')
    //     ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'tbl_product.category_id')
    //     ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
    //     ->orderBy('tbl_product.product_id', 'desc')
    //     ->get();
        $all_product = DB::table('tbl_product')
        ->where('product_status', 1) // Cũng sửa lại đúng điều kiện
        ->orderBy('product_id', 'desc')
        ->get();


    return view('clients.Home', compact('title'))
        ->with('category', $cate_product)
        ->with('brand', $brand_product)
        ->with('product',$all_product);
        
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
