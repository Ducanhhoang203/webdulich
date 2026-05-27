<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;
use DB;

class WishlistController extends Controller
{
    // Thêm vào yêu thích (yêu cầu đăng nhập)
    public function addToWishlist($id)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Vui lòng đăng nhập để thêm vào yêu thích.'], 401);
        }

        $userId = Auth::id();

        $exists = Wishlist::where('user_id', $userId)
            ->where('product_id', $id)
            ->first();

        if ($exists) {
            return response()->json(['message' => 'Sản phẩm đã có trong danh sách yêu thích.']);
        }

        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $id,
        ]);

        return response()->json(['message' => 'Đã thêm vào yêu thích!']);
    }

    // Hiển thị danh sách của riêng user
    public function showWishlist()
    { $title = "Danh sách yêu thích";
        if (!Auth::check()) {
            return redirect('/dangnhap')->with('error', 'Vui lòng đăng nhập để xem danh sách yêu thích!');
        }

        $userId = Auth::id();
        $wishlists = Wishlist::with('product')
            ->where('user_id', $userId)
            ->get();

        return view('wishlist', compact('wishlists', 'title'));
    }

    public function topWishlist()
    {
        $topProducts = Product::withCount('wishlists')
        ->orderByDesc('wishlists_count')
        ->take(8)
        ->get();

    return view('top_wishlist', compact('topProducts'));

    }
}
