<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'user_id', 'name', 'email', 'phone', 'message',
        'service_rating', 'guide_rating', 'price_rating', 'safety_rating',
        'food_rating', 'hotel_rating'
    ];

    // Thêm dòng này
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(Usernguoidung::class, 'user_id', 'id');
    }
}
