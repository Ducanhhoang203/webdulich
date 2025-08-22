<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
   
    public function add_banner()
    {
        return view('admin.add_banner');
    }

    /**
     * Lưu banner mới vào database
     */
    public function save_banner(Request $request)
    {
        $data = [];
        $data['tile_baner'] = $request->input('tile_baner');

        // Upload hình ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/banner'), $filename);
            $data['image'] = 'uploads/banner/'.$filename;
        }

        DB::table('tbl_banner')->insert($data);

        Session::flash('message', 'Thêm banner thành công');
        return redirect('/all-banner');
    }

    /**
     * Hiển thị tất cả banner
     */
    public function all_banner()
    {
      $all_banner = DB::table('tbl_banner')
        ->orderBy('id', 'desc')
        ->paginate(1); // 5 banner mỗi trang

    return view('admin.all_banner', compact('all_banner'));
    }

    /**
     * Hiển thị form sửa banner
     */
    public function edit_banner($id)
    {
        $edit_banner = DB::table('tbl_banner')->where('id', $id)->first();

        return view('admin.edit_banner', compact('edit_banner'));
    }

    /**
     * Cập nhật banner
     */
    public function update_banner(Request $request, $id)
    {
        $data = [];
        $data['tile_baner'] = $request->input('tile_baner');

        // Upload lại hình mới nếu có
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/banner'), $filename);
            $data['image'] = 'uploads/banner/'.$filename;
        }

        DB::table('tbl_banner')->where('id', $id)->update($data);

        Session::flash('message', 'Cập nhật banner thành công');
        return redirect('/all-banner');
    }

    /**
     * Xóa banner
     */
    public function delete_banner($id)
    {
        DB::table('tbl_banner')->where('id', $id)->delete();

        Session::flash('message', 'Xóa banner thành công');
        return redirect('/all-banner');
    }
}
