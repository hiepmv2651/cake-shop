<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chiTietHD extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'quantity', 'hoadon_id', 'Product_id'];

    public function orders() {
        return $this->belongsTo(Order::class, 'hoadon_id');
    }

    public function products() {
        return $this->belongsTo(Product::class, 'Product_id');
    }
}