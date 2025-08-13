<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         $footer_info2 = DB::table('footer_info')->orderBy('id', 'desc')->first();
         $product_ft = DB::table('tbl_product')->orderBy('product_id','desc')->limit(5)->get();
         $tbl_event_ft = DB::table('tbl_event')->orderBy('id','desc')->limit(5)->get();
         $posts_ft =DB::table('posts')->orderBy('id','desc')->limit(5)->get();
        // Chia sẻ biến $footer_info2 cho tất cả view
     View::share([
        'footer_info2' => $footer_info2,
        'product_ft'   => $product_ft,
        'tbl_event_ft' =>$tbl_event_ft,
        'posts_ft'     =>$posts_ft
    ]);
    }
}
