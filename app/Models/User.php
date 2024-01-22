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
        'address'=>'',
        'email_verified_at' => null, // Đặt giá trị mặc định cho email_verified_at
    ];
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'phone','address', 'email_verified_at',
    ];


    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? now() : null;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin()
    {
        return $this->role === 'admin'; 
        return $this->is_admin; 
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    protected $appends = ['new_password'];
    
    public function setNewPasswordAttribute($value)
    {
        $this->attributes['new_password'] = $value;
    }
}
