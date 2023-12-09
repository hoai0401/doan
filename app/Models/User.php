<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $attributes = [
        'name' => '',
        'email' => '',
        'password' => '', 
        'is_admin' => 0, // Đặt giá trị mặc định cho is_admin
        'phone' => '', 
        'email_verified_at' => null, // Đặt giá trị mặc định cho email_verified_at
    ];
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'phone', 'email_verified_at',
    ];


    public function setEmailVerifiedAtAttribute($value)
    {
        // Sử dụng thời điểm hiện tại nếu $value là true
        // Sử dụng null nếu $value là false
        $this->attributes['email_verified_at'] = $value ? now() : null;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
