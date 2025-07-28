<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Reviewscontroller extends Controller
{
  public function add_reviews(){
    $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
    return view('admin.add_reviews',compact('product'));
  }
  public function save_reviews(Request $request){
   $request->validate([
  'product_id' => 'required|exists:tbl_product,product_id',
  'review_name' => 'required|string|max:255',
  'review_star' => 'required|integer|min:1|max:5',
   'reviews_content'=>'nullable|string',
   'reviews_start'=>  'required|in:0,1',

   ]);

   DB::table('tbl_review')->insert([
     'product_id' => $request->product_id,
    'review_name' => $request->review_name,
    'review_star' => $request->review_star,  // Sửa lại ở đây
    'reviews_content' => $request->reviews_content,
    'reviews_start' => $request->reviews_start,
    'created_at' => now(),
    'updated_at' => now(),
]);

    Session::put('message', 'Thêm reviews thành công!');
    return redirect()->back();
  }
  public function all_reviews(){
    $all_reviews = DB::table('tbl_review')->join('tbl_product','tbl_product.product_id','=','tbl_review.product_id')
    ->orderBy('reviews_id','desc')
    ->get();
    return view('admin.all_reviews',compact('all_reviews'));
  }
public function edit_reviews($reviews_id){
    $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
    $edit_value = DB::table('tbl_review')->where('reviews_id', $reviews_id)->first();

    if (!$edit_value) {
        Session::put('message', 'Không tìm thấy review!');
        return Redirect::to('all-reviews');
    }

    return view('admin.edit_reviews', compact('product', 'edit_value'));
}

public function update_reviews(Request $request, $reviews_id)
{
    $request->validate([
        'product_id' => 'required|exists:tbl_product,product_id',
        'review_name' => 'required|string|max:255',
        'review_star' => 'required|integer|min:1|max:5',
        'reviews_content' => 'nullable|string',
        'reviews_start' => 'required|in:0,1',
    ]);

    $reviews = DB::table('tbl_review')->where('reviews_id', $reviews_id)->first();

    if (!$reviews) {
        return Redirect::to('all-reviews')->with('message', 'Không tìm thấy review!');
    }

    DB::table('tbl_review')
        ->where('reviews_id', $reviews_id)
        ->update([
            'product_id' => $request->product_id,
            'review_name' => $request->review_name,
            'review_star' => $request->review_star,
            'reviews_content' => $request->reviews_content,
            'reviews_start' => $request->reviews_start,
            'updated_at' => now(),
        ]);

    return Redirect::to('all-reviews')->with('message', 'Cập nhật review thành công!');
}


}
