<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    public function add_event()
    {
        $event = DB::table('tbl_event')->orderBy('id', 'desc')->get();
        return view('admin.add_event', compact('event'));
    }

    public function save_event(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/events/';
            $file->move(public_path($path), $filename);
            $imagePath = $path . $filename;
        }

        DB::table('tbl_event')->insert([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('all-event')->with('success', 'Thêm sự kiện thành công!');
    }
    public function all_event()
{
    $events = DB::table('tbl_event')->orderBy('id', 'desc')->get();
    return view('admin.all_event', compact('events'));
}


    // ✅ Hiển thị form chỉnh sửa
    public function edit_event($id)
    {
        $event = DB::table('tbl_event')->where('id', $id)->first();
        return view('admin.edit_event', compact('event'));
    }

    // ✅ Cập nhật thông tin sự kiện
    public function update_event(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $event = DB::table('tbl_event')->where('id', $id)->first();

        $imagePath = $event->image;

        if ($request->hasFile('image')) {
            // Xoá ảnh cũ nếu có
            if ($event->image && File::exists(public_path($event->image))) {
                File::delete(public_path($event->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/events/';
            $file->move(public_path($path), $filename);
            $imagePath = $path . $filename;
        }

        DB::table('tbl_event')->where('id', $id)->update([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imagePath,
            'updated_at' => now(),
        ]);

        return redirect('/all-event')->with('success', 'Cập nhật sự kiện thành công!');
    }

    // ✅ Xoá sự kiện
    public function delete_event($id)
    {
        $event = DB::table('tbl_event')->where('id', $id)->first();

        if ($event) {
            // Xoá ảnh
            if ($event->image && File::exists(public_path($event->image))) {
                File::delete(public_path($event->image));
            }

            DB::table('tbl_event')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Đã xoá sự kiện thành công!');
        }

        return redirect()->back()->with('error', 'Không tìm thấy sự kiện!');
    }
}
