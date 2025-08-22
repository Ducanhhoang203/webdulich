<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
   use Illuminate\Support\Facades\Schema;
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
    // Footer, product, event, posts như trước
    if (Schema::hasTable('footer_infor')) {
        $footer_info2 = DB::table('footer_infor')->orderBy('id', 'desc')->first();
    } else {
        $footer_info2 = null;
    }

    if (Schema::hasTable('tbl_product')) {
        $product_ft = DB::table('tbl_product')->orderBy('product_id', 'desc')->limit(5)->get();
    } else {
        $product_ft = collect();
    }

    if (Schema::hasTable('tbl_event')) {
        $tbl_event_ft = DB::table('tbl_event')->orderBy('id', 'desc')->limit(5)->get();
    } else {
        $tbl_event_ft = collect();
    }

    if (Schema::hasTable('posts')) {
        $posts_ft = DB::table('posts')->orderBy('id','desc')->limit(5)->get();
    } else {
        $posts_ft = collect();
    }

    // Menu đa cấp
    if (Schema::hasTable('menus')) {
        $menus = DB::table('menus')->whereNull('parent_id')->orderBy('order', 'asc')->get();
        $children = DB::table('menus')->whereNotNull('parent_id')->orderBy('order', 'asc')->get();
    } else {
        $menus = collect();
        $children = collect();
    }

    // Banner
    if (Schema::hasTable('tbl_banner')) {
        $banner = DB::table('tbl_banner')->orderBy('id', 'desc')->first();
    } else {
        $banner = null;
    }

    // Chia sẻ biến cho tất cả view
    View::share([
        'footer_info2' => $footer_info2,
        'product_ft'   => $product_ft,
        'tbl_event_ft' => $tbl_event_ft,
        'posts_ft'     => $posts_ft,
        'menus'        => $menus,
        'children'     => $children,
        'banner'       => $banner,  // thêm vào đây
    ]);
}


}
