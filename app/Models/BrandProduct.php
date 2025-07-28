<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandProduct extends Model
{
    use HasFactory;

    protected $table = 'tbl_brand';
    protected $primaryKey = 'brand_id';
    public $timestamps = false;
}
