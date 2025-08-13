<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/baiviet-active', function () {
    return response()->json([
        'status' => 'ok',
        'data' => DB::table('posts')->where('Baiviet_status', 1)->get()
    ]);
});



?>