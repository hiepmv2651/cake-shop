<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'category', 'price', 'quantity', 'discount_price', 'image'];
    use HasFactory;

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function chiTietHDs() {
        return $this->hasMany(chiTietHD::class);
    }
}