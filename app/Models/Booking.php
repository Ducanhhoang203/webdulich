<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'tbl_booking';
    protected $primaryKey = 'booking_id';
    public $timestamps = true;

    protected $fillable = [
        'product_id',      // ✅ cho phép gán
        'user_id',
        'start_date',
        'time',
        'adult',
        'child',
        'extra_option',
        'total_price', 
        'status',    // ✅ phải có dòng này!
    ];
    public function product()
    {
        // Giả định Model Product có tồn tại và khóa ngoại là 'product_id'
        return $this->belongsTo(Product::class, 'product_id'); 
    }
    
    /**
     * Mối quan hệ với Người dùng
     */
    public function user()
    {
        // Giả định Model User có tồn tại và khóa ngoại là 'user_id'
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
