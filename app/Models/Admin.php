<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_admin';

    protected $fillable = [
        'admin_email',
        'admin_password',
        'admin_name',
        'admin_phone',
        'admin_level',
    ];

    protected $hidden = [
        'admin_password',
        'remember_token',
    ];

    public $timestamps = false;

    // Định nghĩa cột password đúng chuẩn Laravel
    public function getAuthPassword()
    {
        return $this->admin_password;
    }

    // ==========================
    //  HÀM PHÂN QUYỀN
    // ==========================
    public function isAdmin()
    {
        return $this->admin_level >= 1; // Admin trở lên
    }

    public function isSuperAdmin()
    {
        return $this->admin_level == 2; // Chỉ super admin
    }

    public function isNormalUser()
    {
        return $this->admin_level == 0; // user thường
    }
}
