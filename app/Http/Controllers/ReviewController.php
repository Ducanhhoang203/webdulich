<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\TblProduct;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'service_rating' => 'required|integer|min:0|max:5',
            'guide_rating' => 'required|integer|min:0|max:5',
            'price_rating' => 'required|integer|min:0|max:5',
            'safety_rating' => 'required|integer|min:0|max:5',
            'food_rating' => 'required|integer|min:0|max:5',
            'hotel_rating' => 'required|integer|min:0|max:5',
        ]);

        Review::create([
            'product_id' => $productId,
            'user_id' => Auth::id(), // NULL nếu chưa đăng nhập
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'service_rating' => $request->service_rating,
            'guide_rating' => $request->guide_rating,
            'price_rating' => $request->price_rating,
            'safety_rating' => $request->safety_rating,
            'food_rating' => $request->food_rating,
            'hotel_rating' => $request->hotel_rating,
        ]);

        return redirect()->back()->with('success', 'Cảm ơn bạn đã gửi đánh giá!');
    }
}
