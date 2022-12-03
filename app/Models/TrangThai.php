<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class, 'trangthai_id');
    }
}