<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'discount_percentage',
        'start_date',
        'end_date'
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($promotion) {
            // Kiểm tra ngày kết thúc, nếu đã hết hạn, set deleted_at
            if ($promotion->end_date && now() > $promotion->end_date) {
                $promotion->deleted_at = now();
            }
        });
    }
}
