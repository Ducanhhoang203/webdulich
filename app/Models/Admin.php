<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'tbl_admin'; // Tên bảng cụ thể

    protected $fillable = [
        'admin_email',
        'admin_password',
        // thêm các cột khác nếu cần
    ];

    public $timestamps = false; // nếu bảng không có cột created_at, updated_at
}

