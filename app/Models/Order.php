<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function trangthais()
    {
        return $this->belongsTo(TrangThai::class, 'trangthai_id');
    }

    public function chiTietHDs()
    {
        return $this->hasMany(ChiTietHD::class);
    }
    protected $fillable = ['ngaydat', 'phone', 'address', 'description', 'user_id', 'trangthai_id', 'tongtien', 'payment_status'];
}
