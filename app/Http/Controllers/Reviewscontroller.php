<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ReviewsController extends Controller
{
    // Hiển thị form thêm review
    public function add_reviews()
    {
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
        return view('admin.add_reviews', compact('product'));
    }

    // Lưu review
    public function save_reviews(Request $request)
    {
        // Validate tiếng Việt
        $request->validate([
            'product_id' => 'required|exists:tbl_product,product_id',
            'review_name' => 'required|string|max:255',
            'review_star' => 'required|integer|min:1|max:5',
            'reviews_content' => 'nullable|string',
            'reviews_start'=>  'required|in:0,1',
        ], [
            'product_id.required' => 'Danh mục sản phẩm không được để trống.',
            'product_id.exists' => 'Danh mục sản phẩm không tồn tại.',
            'review_name.required' => 'Tên người review không được để trống.',
            'review_name.string' => 'Tên người review phải là chuỗi ký tự.',
            'review_name.max' => 'Tên người review không được vượt quá 255 ký tự.',
            'review_star.required' => 'Số sao đánh giá không được để trống.',
            'review_star.integer' => 'Số sao phải là số nguyên.',
            'review_star.min' => 'Số sao tối thiểu là 1.',
            'review_star.max' => 'Số sao tối đa là 5.',
            'reviews_content.string' => 'Nội dung review phải là chuỗi ký tự.',
            'reviews_start.required' => 'Trạng thái hiển thị không được để trống.',
            'reviews_start.in' => 'Trạng thái hiển thị không hợp lệ.',
        ]);

        DB::table('tbl_review')->insert([
            'product_id' => $request->product_id,
            'review_name' => $request->review_name,
            'review_star' => $request->review_star,
            'reviews_content' => $request->reviews_content ?? '', // tránh null
            'reviews_start' => $request->reviews_start,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Session::put('message', 'Thêm review thành công!');
        return redirect()->back();
    }

    // Hiển thị tất cả review
    public function all_reviews()
    {
        $all_reviews = DB::table('tbl_review')
            ->join('tbl_product','tbl_product.product_id','=','tbl_review.product_id')
            ->orderBy('reviews_id','desc')
            ->get();

        return view('admin.all_reviews', compact('all_reviews'));
    }

    // Hiển thị form chỉnh sửa review
    public function edit_reviews($reviews_id)
    {
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
        $edit_value = DB::table('tbl_review')->where('reviews_id', $reviews_id)->first();

        if (!$edit_value) {
            Session::put('message', 'Không tìm thấy review!');
            return Redirect::to('all-reviews');
        }

        return view('admin.edit_reviews', compact('product', 'edit_value'));
    }

    // Cập nhật review
    public function update_reviews(Request $request, $reviews_id)
    {
        $request->validate([
            'product_id' => 'required|exists:tbl_product,product_id',
            'review_name' => 'required|string|max:255',
            'review_star' => 'required|integer|min:1|max:5',
            'reviews_content' => 'nullable|string',
            'reviews_start' => 'required|in:0,1',
        ], [
            'product_id.required' => 'Danh mục sản phẩm không được để trống.',
            'product_id.exists' => 'Danh mục sản phẩm không tồn tại.',
            'review_name.required' => 'Tên người review không được để trống.',
            'review_name.string' => 'Tên người review phải là chuỗi ký tự.',
            'review_name.max' => 'Tên người review không được vượt quá 255 ký tự.',
            'review_star.required' => 'Số sao đánh giá không được để trống.',
            'review_star.integer' => 'Số sao phải là số nguyên.',
            'review_star.min' => 'Số sao tối thiểu là 1.',
            'review_star.max' => 'Số sao tối đa là 5.',
            'reviews_content.string' => 'Nội dung review phải là chuỗi ký tự.',
            'reviews_start.required' => 'Trạng thái hiển thị không được để trống.',
            'reviews_start.in' => 'Trạng thái hiển thị không hợp lệ.',
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
                'reviews_content' => $request->reviews_content ?? '', // tránh null
                'reviews_start' => $request->reviews_start,
                'updated_at' => now(),
            ]);

        return Redirect::to('all-reviews')->with('message', 'Cập nhật review thành công!');
    }
    // Xóa review
public function delete_reviews($reviews_id)
{
    $review = DB::table('tbl_review')->where('reviews_id', $reviews_id)->first();

    if (!$review) {
        return Redirect::to('all-reviews')->with('message', 'Không tìm thấy review để xóa!');
    }

    DB::table('tbl_review')->where('reviews_id', $reviews_id)->delete();

    return Redirect::to('all-reviews')->with('message', 'Xóa review thành công!');
}

}
