<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['image_url'];
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

=======
    protected $fillable = ['image_url', 'product_id'];
    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}
>>>>>>> f5aca7aaa02c5dc8a63deedd9ade37fbbf297d02
}
