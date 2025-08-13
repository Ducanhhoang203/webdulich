<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaivietApiController extends Controller
{
    public function index()
    {
        return response()->json(DB::table('posts')->get());
    }

    public function show($id)
    {
        $baiviet = DB::table('posts')->where('id', $id)->first();
        if (!$baiviet) {
            return response()->json(['error' => 'Không tìm thấy bài viết'], 404);
        }
        return response()->json($baiviet);
    }

    public function store(Request $request)
    {
        $id = DB::table('posts')->insertGetId([
            'Baiviet_title' => $request->Baiviet_title,
            'Baiviet_slug' => $request->Baiviet_slug,
            'Baiviet_status' => $request->Baiviet_status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['message' => 'Đã tạo bài viết', 'id' => $id], 201);
    }

    public function update(Request $request, $id)
    {
        DB::table('posts')->where('id', $id)->update([
            'Baiviet_title' => $request->Baiviet_title,
            'updated_at' => now(),
        ]);
        return response()->json(['message' => 'Đã cập nhật']);
    }

    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return response()->json(['message' => 'Đã xoá']);
    }
}
