<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class galleryController extends Controller
{
    /**
     * Hiển thị danh sách bài viết
     */
    public function index()
    {
        $title = "Trang bài viết";

        $all_baiviet = DB::table('posts')
            ->join(
                'tbl_category_product',
                'tbl_category_product.catgory_id',
                '=',
                'posts.Baiviet_category'
            )
            ->where('posts.Baiviet_status', 1)
            ->orderBy('posts.id', 'desc')
            ->select('posts.*', 'tbl_category_product.*')
            ->paginate(6);

        // Convert Markdown sang HTML
        foreach ($all_baiviet as $post) {
            if (!empty($post->Baiviet_content)) {
                $post->Baiviet_content = Str::markdown($post->Baiviet_content);
            }
        }

        return view('clients.gallery', compact('title', 'all_baiviet'));
    }

    /**
     * Hiển thị chi tiết bài viết
     */
    public function show($id)
    {
        $title = "Chi tiết bài viết";

        $post = DB::table('posts')
            ->join(
                'tbl_category_product',
                'tbl_category_product.catgory_id',
                '=',
                'posts.Baiviet_category'
            )
            ->where('posts.id', $id)
            ->where('posts.Baiviet_status', 1)
            ->select('posts.*', 'tbl_category_product.*')
            ->first();

        if (!$post) {
            abort(404);
        }

        // Convert Markdown
        if (!empty($post->Baiviet_content)) {
            $post->Baiviet_content = Str::markdown($post->Baiviet_content);
        }

        return view('clients.gallery_detail', compact('title', 'post'));
    }
}