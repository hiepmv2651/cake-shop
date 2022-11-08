<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['ngaydat', 'phone', 'address', 'description', 'tongtien', 'user_id', 'trangthai_id', 'payment_status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function trangthais() {
        return $this->belongsTo(TrangThai::class, 'trangthai_id');
    }

    public function chiTietHDs() {
        return $this->hasMany(chiTietHD::class);
    }
}