<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Curriculums;

class ChitietkhoahocController extends Controller
{
    public function index()
    {
        $title = 'Trang chi tiết khóa học';
        return view('clients.chitietkhoahoc', compact('title'));
    }

    public function add_chitietkhoahoc()
    {
        $product = DB::table('tbl_product')->orderBy('product_id', 'desc')->get();
        return view('admin.add_chitietkhoahoc', compact('product'));
    }

    public function save_chitietkhoahoc(Request $request)
    {
        $request->validate([
            'curriculums_title'   => 'required|string|max:255',
            'curriculums_content' => 'required|string|max:65535',
            'product'             => 'required|exists:tbl_product,product_id',
        ], [
            'curriculums_title.required'   => 'Vui lòng nhập tiêu đề chương trình.',
            'curriculums_title.string'     => 'Tiêu đề không hợp lệ.',
            'curriculums_title.max'        => 'Tiêu đề quá dài (tối đa 255 ký tự).',
            'curriculums_content.required' => 'Vui lòng nhập nội dung chương trình.',
            'curriculums_content.string'   => 'Nội dung không hợp lệ.',
            'curriculums_content.max'      => 'Nội dung quá dài.',
            'product.required'             => 'Vui lòng chọn khóa học.',
            'product.exists'               => 'Khóa học không tồn tại trong cơ sở dữ liệu.',
        ]);

        DB::table('tbl_curriculums')->insert([
            'product_id'          => $request->product,
            'curriculums_title'   => $request->curriculums_title,
            'curriculums_content' => $request->curriculums_content,
            'created_at'          => now(),
            'updated_at'          => now(),
        ]);

        Session::put('message', 'Thêm chương trình thành công!');
        return redirect()->back();
    }

    public function all_chitietkhoahoc()
    {
        $all_chitiet = DB::table('tbl_curriculums')
            ->join('tbl_product', 'tbl_curriculums.product_id', '=', 'tbl_product.product_id')
            ->orderBy('tbl_curriculums.curriculums_id', 'desc')
            ->get();

        return view('admin.all_chitietkhoahoc', compact('all_chitiet'));
    }

    public function edit_chitietkhoahoc($curriculums_id)
    {
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
        $edit_value = DB::table('tbl_curriculums')->where('curriculums_id', $curriculums_id)->first();

        if (!$edit_value) {
            Session::put('message', 'Chương trình không tồn tại');
            return Redirect::to('all-chitietkhoahoc');
        }

        return view('admin.edit_chitietkhoa', compact('product', 'edit_value'));
    }

    public function update_chitietkhoahoc(Request $request, $curriculums_id)
    {
        $request->validate([
            'curriculums_title'   => 'required|string|max:255',
            'curriculums_content' => 'required|string|max:65535',
            'product'             => 'required|exists:tbl_product,product_id',
        ], [
            'curriculums_title.required'   => 'Vui lòng nhập tiêu đề chương trình.',
            'curriculums_title.string'     => 'Tiêu đề không hợp lệ.',
            'curriculums_title.max'        => 'Tiêu đề quá dài (tối đa 255 ký tự).',
            'curriculums_content.required' => 'Vui lòng nhập nội dung chương trình.',
            'curriculums_content.string'   => 'Nội dung không hợp lệ.',
            'curriculums_content.max'      => 'Nội dung quá dài.',
            'product.required'             => 'Vui lòng chọn khóa học.',
            'product.exists'               => 'Khóa học không tồn tại trong cơ sở dữ liệu.',
        ]);

        $curriculums = DB::table('tbl_curriculums')->where('curriculums_id', $curriculums_id)->first();

        if (!$curriculums) {
            return redirect()->back()->with('message', 'Không tìm thấy chương trình!');
        }

        DB::table('tbl_curriculums')
            ->where('curriculums_id', $curriculums_id)
            ->update([
                'curriculums_title'   => $request->curriculums_title,
                'curriculums_content' => $request->curriculums_content,
                'product_id'          => $request->product,
                'updated_at'          => now(),
            ]);

        return redirect()->to('all-chitietkhoahoc')->with('message', 'Cập nhật chương trình thành công!');
    }

    public function delete_chitietkhoahoc($curriculums_id)
    {
        $curriculums = Curriculums::find($curriculums_id);
        if ($curriculums) {
            $curriculums->delete();
            Session::put('message', 'Xóa chương trình thành công');
        } else {
            Session::put('message', 'Chương trình không tồn tại');
        }

        return Redirect::to('all-chitietkhoahoc');
    }
}
