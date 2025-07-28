<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class instructors extends Model
{
     use HasFactory;
     protected $table = 'tbl_instructors';
    protected $primaryKey = 'instructors_id';
    public $timestamps = false;
}
