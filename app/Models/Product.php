<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
<<<<<<< HEAD
    public function image()
    {
        return $this->belongsTo(Image::class,'image_id');
    }
=======
>>>>>>> f5aca7aaa02c5dc8a63deedd9ade37fbbf297d02

    public function images()
{
    return $this->hasMany(Image::class, 'product_id');
}
    
}
