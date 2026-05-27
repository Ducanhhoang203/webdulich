<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usernguoidung extends Authenticatable
{
    use Notifiable;

    protected $table = 'usernguoidung';

    protected $fillable = [
        'name',
        'email',
        'google_id',
        'avatar',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
