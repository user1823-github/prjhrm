<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TienPhatNhanVien extends Model
{
    use HasFactory;

    protected $table = 'tienphat_nhanvien';
    protected $primaryKey = null;
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'maTienPhat',
        'maNV',
        // 'trangThai',
    ];

    // Quan hệ ngược tới TienPhat
    public function tienPhats()
    {
        return $this->belongsTo(TienPhat::class, 'maTienPhat', 'maTienPhat');
    }

    // Quan hệ ngược tới NhanVien
    public function nhanViens()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}
