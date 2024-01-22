<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
    protected $fillable = [
        'user_id',
        'issued_date',
        'shipping_address',
        'shipping_phone',
        'status',
        'Total'
    ];
    public function canBeCancelled()
    {
        return $this->status === 'Pending' || $this->status === 'Transporting';
    }
    public function canBeMarkedTransporting()
    {
        return $this->status === 'Pending';
    }
    public function canBeMarkedPaid()
    {
        return $this->status === 'Transporting';
    }
    
}