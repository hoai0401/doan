<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replie extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'review_day',
        'user_id',
        'comment_id',
    ];
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
