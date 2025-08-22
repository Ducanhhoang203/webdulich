<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    // Hiển thị danh sách menu
    public function index()
    {
        // Lấy menu cấp cha
        $menus = DB::table('menus')->whereNull('parent_id')->orderBy('order', 'desc')->get();
        // Lấy tất cả menu con
        $children = DB::table('menus')->whereNotNull('parent_id')->orderBy('order', 'desc')->get();
        return view('admin.all_menu', compact('menus', 'children'));
    }

    // Form tạo menu mới
    public function create()
    {
        $menus = DB::table('menus')->whereNull('parent_id')->get(); // chọn menu cha
        return view('admin.add_menu', compact('menus'));
    }

    // Lưu menu mới
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        DB::table('menus')->insert([
            'title' => $request->title,
            'url' => $request->url,
            'parent_id' => $request->parent_id,
            'order' => $request->order ?? 0,
            'status' => $request->status ?? 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu đã được tạo thành công.');
    }

    // Form sửa menu
    public function edit($id)
    {
        $menu = DB::table('menus')->where('id', $id)->first();
        $menus = DB::table('menus')->whereNull('parent_id')->where('id', '!=', $id)->get();
        return view('admin.edit_menu', compact('menu', 'menus'));
    }

    // Cập nhật menu
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        DB::table('menus')->where('id', $id)->update([
            'title' => $request->title,
            'url' => $request->url,
            'parent_id' => $request->parent_id,
            'order' => $request->order ?? 0,
            'status' => $request->status ?? 1,
            'updated_at' => now(),
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu đã được cập nhật.');
    }

    // Xóa menu đệ quy tất cả cấp con
    public function destroy($id)
    {
        $this->deleteMenuRecursive($id);

        return redirect()->route('menus.index')->with('success', 'Menu đã được xóa.');
    }

    // Hàm đệ quy xóa menu và tất cả menu con
    private function deleteMenuRecursive($id)
    {
        // Lấy tất cả menu con trực tiếp
        $children = DB::table('menus')->where('parent_id', $id)->get();

        foreach ($children as $child) {
            // Xóa đệ quy menu con
            $this->deleteMenuRecursive($child->id);
        }

        // Xóa menu hiện tại
        DB::table('menus')->where('id', $id)->delete();
    }
}
