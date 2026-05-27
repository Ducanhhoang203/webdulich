<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
     use HasFactory;

    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
   public function wishlists()
{
    return $this->hasMany(Wishlist::class, 'product_id', 'product_id');
}

}

