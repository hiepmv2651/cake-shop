<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHD extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->belongsTo(Order::class, 'hoadon_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'Product_id');
    }
    protected $fillable = ['price', 'quantity', 'hoadon_id', 'Product_id', 'image'];
}
