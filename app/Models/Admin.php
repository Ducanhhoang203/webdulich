<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // <-- dùng Authenticatable
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_admin'; // tên bảng admin

    protected $fillable = [
        'admin_email',
        'admin_password',
        // các cột khác nếu cần
    ];

    protected $hidden = [
        'admin_password', // ẩn mật khẩu
        'remember_token',
    ];

    public $timestamps = false; // nếu bảng không có created_at, updated_at

    // Thêm hàm getAuthPassword() nếu cột mật khẩu không tên mặc định 'password'
    public function getAuthPassword()
    {
        return $this->admin_password;
    }
}
