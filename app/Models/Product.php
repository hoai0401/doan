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
    protected $fillable=[''];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class,'image_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

}
