<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'unit_price',
        'promotion_id',
    ];
}
