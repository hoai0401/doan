<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'review_day',
        'user_id',
        'product_id',
    ];
    public function replies()
    {
        return $this->hasMany(Replie::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
