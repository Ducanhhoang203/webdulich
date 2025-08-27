<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Baivietcontroller extends Controller
{
    // Hiển thị form thêm bài viết
    public function add_baiviet()
    {
        $cate_product = DB::table('tbl_category_product')->orderBy('catgory_id', 'desc')->get();
        $baiviet = DB::table('posts')->orderBy('id','desc')->get();
        return view('admin.add_baiviet', compact('cate_product','baiviet'));
    }

    // Lưu bài viết
    public function save_baiviet(Request $request)
    {
        // Validate tất cả trường, thông báo tiếng Việt
        $request->validate([
            'Baiviet_title' => 'required|string|max:255',
            'Baiviet_slug' => 'required|string|max:255',
            'Baiviet_content' => 'required|string',
            'Baiviet_excerpt' => 'required|string',
            'Baiviet_category' => 'required|integer',
            'Baiviet_author' => 'required|string|max:100',
            'Baiviet_status' => 'required|in:0,1',
            'Baiviet_image_main' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
            'Baiviet_image_extra1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
            'Baiviet_image_extra2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
        ], [
            'Baiviet_title.required' => 'Tiêu đề bài viết không được để trống.',
            'Baiviet_slug.required' => 'Slug bài viết không được để trống.',
            'Baiviet_content.required' => 'Nội dung bài viết không được để trống.',
            'Baiviet_excerpt.required' => 'Trích dẫn bài viết không được để trống.',
            'Baiviet_category.required' => 'Danh mục bài viết không được để trống.',
            'Baiviet_author.required' => 'Tên tác giả không được để trống.',
            'Baiviet_status.required' => 'Trạng thái bài viết không được để trống.',
        ]);

        $upload_path = public_path('uploads/posts');
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0755, true);
        }

        // Xử lý ảnh
        $image_main_name = $request->hasFile('Baiviet_image_main') ? time() . '_main_' . uniqid() . '.' . $request->Baiviet_image_main->getClientOriginalExtension() : '';
        if ($request->hasFile('Baiviet_image_main')) $request->Baiviet_image_main->move($upload_path, $image_main_name);

        $image_extra1_name = $request->hasFile('Baiviet_image_extra1') ? time() . '_extra1_' . uniqid() . '.' . $request->Baiviet_image_extra1->getClientOriginalExtension() : '';
        if ($request->hasFile('Baiviet_image_extra1')) $request->Baiviet_image_extra1->move($upload_path, $image_extra1_name);

        $image_extra2_name = $request->hasFile('Baiviet_image_extra2') ? time() . '_extra2_' . uniqid() . '.' . $request->Baiviet_image_extra2->getClientOriginalExtension() : '';
        if ($request->hasFile('Baiviet_image_extra2')) $request->Baiviet_image_extra2->move($upload_path, $image_extra2_name);

        // Lưu vào database
        DB::table('posts')->insert([
            'Baiviet_title' => $request->Baiviet_title,
            'Baiviet_slug' => $request->Baiviet_slug,
            'Baiviet_content' => $request->Baiviet_content,
            'Baiviet_excerpt' => $request->Baiviet_excerpt,
            'Baiviet_category' => $request->Baiviet_category,
            'Baiviet_image_main' => $image_main_name,
            'Baiviet_image_extra1' => $image_extra1_name,
            'Baiviet_image_extra2' => $image_extra2_name,
            'Baiviet_author' => $request->Baiviet_author,
            'Baiviet_status' => $request->Baiviet_status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Thêm bài viết thành công!');
    }

    // Hiển thị tất cả bài viết
    public function all_baiviet()
    { 
        $all_posts = DB::table('posts')
            ->join('tbl_category_product','tbl_category_product.catgory_id','=','posts.Baiviet_category')
            ->orderBy('id','desc')
            ->get();
        return view('admin.all_baiviet', compact('all_posts'));
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit_baiviet($id)
    {
        $edit_value = DB::table('posts')->where('id', $id)->first();
        $cate_product = DB::table('tbl_category_product')->orderBy('catgory_id', 'desc')->get();

        if (!$edit_value) {
            return redirect()->back()->with('error', 'Bài viết không tồn tại!');
        }

        return view('admin.edit_baiviet', compact('edit_value', 'cate_product'));
    }

    // Cập nhật bài viết
    public function upload_baiviet(Request $request, $id)
    {
        $request->validate([
            'Baiviet_title' => 'required|string|max:255',
            'Baiviet_slug' => 'required|string|max:255',
            'Baiviet_content' => 'required|string',
            'Baiviet_excerpt' => 'required|string',
            'Baiviet_category' => 'required|integer',
            'Baiviet_author' => 'required|string|max:100',
            'Baiviet_status' => 'required|in:0,1',
            'Baiviet_image_main' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
            'Baiviet_image_extra1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
            'Baiviet_image_extra2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
        ], [
            'Baiviet_title.required' => 'Tiêu đề bài viết không được để trống.',
            'Baiviet_slug.required' => 'Slug bài viết không được để trống.',
            'Baiviet_content.required' => 'Nội dung bài viết không được để trống.',
            'Baiviet_excerpt.required' => 'Trích dẫn bài viết không được để trống.',
            'Baiviet_category.required' => 'Danh mục bài viết không được để trống.',
            'Baiviet_author.required' => 'Tên tác giả không được để trống.',
            'Baiviet_status.required' => 'Trạng thái bài viết không được để trống.',
        ]);

        $upload_path = public_path('uploads/posts');
        if (!file_exists($upload_path)) mkdir($upload_path, 0755, true);

        $baiviet = DB::table('posts')->where('id', $id)->first();
        if (!$baiviet) return redirect()->back()->with('error', 'Bài viết không tồn tại!');

        $image_main_name = $baiviet->Baiviet_image_main;
        $image_extra1_name = $baiviet->Baiviet_image_extra1;
        $image_extra2_name = $baiviet->Baiviet_image_extra2;

        if ($request->hasFile('Baiviet_image_main')) {
            $image = $request->file('Baiviet_image_main');
            $image_main_name = time() . '_main_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($upload_path, $image_main_name);
        }

        if ($request->hasFile('Baiviet_image_extra1')) {
            $image = $request->file('Baiviet_image_extra1');
            $image_extra1_name = time() . '_extra1_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($upload_path, $image_extra1_name);
        }

        if ($request->hasFile('Baiviet_image_extra2')) {
            $image = $request->file('Baiviet_image_extra2');
            $image_extra2_name = time() . '_extra2_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($upload_path, $image_extra2_name);
        }

        DB::table('posts')->where('id', $id)->update([
            'Baiviet_title' => $request->Baiviet_title,
            'Baiviet_slug' => $request->Baiviet_slug,
            'Baiviet_content' => $request->Baiviet_content,
            'Baiviet_excerpt' => $request->Baiviet_excerpt,
            'Baiviet_category' => $request->Baiviet_category,
            'Baiviet_image_main' => $image_main_name,
            'Baiviet_image_extra1' => $image_extra1_name,
            'Baiviet_image_extra2' => $image_extra2_name,
            'Baiviet_author' => $request->Baiviet_author,
            'Baiviet_status' => $request->Baiviet_status,
            'updated_at' => now(),
        ]);

        return redirect()->route('all.baiviet')->with('success', 'Cập nhật bài viết thành công!');
    }

    // Xoá bài viết
    public function delete_baiviet($id)
    {
        $baiviet = DB::table('posts')->where('id', $id)->first();
        if (!$baiviet) return redirect()->back()->with('error', 'Bài viết không tồn tại!');

        $image_fields = ['Baiviet_image_main', 'Baiviet_image_extra1', 'Baiviet_image_extra2'];
        foreach ($image_fields as $field) {
            if (!empty($baiviet->$field)) {
                $file_path = public_path('uploads/posts/' . $baiviet->$field);
                if (file_exists($file_path)) unlink($file_path);
            }
        }

        DB::table('posts')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xoá bài viết thành công!');
    }

    // Chi tiết bài viết cho client
    public function chitietbaiviet($id)
    {
        $title = "Trang bài viết chi tiết";
        $baiviet = DB::table('posts')
            ->join('tbl_category_product', 'tbl_category_product.catgory_id', '=', 'posts.Baiviet_category')
            ->where('posts.id', $id)
            ->first();

        $product = DB::table('tbl_product')
            ->where('product_status', 1)
            ->orderBy('product_id', 'desc')
            ->limit(3)
            ->get();

        return view('clients.blogsider', compact('baiviet', 'title', 'product'));
    }
}
