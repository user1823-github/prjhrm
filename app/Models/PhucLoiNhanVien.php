<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhucLoiNhanVien extends Model
{
    use HasFactory;

    protected $table = 'phucloi_nhanvien';
    protected $primaryKey = null;
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'maPhucLoi',
        'maNV',
        // 'trangThai',
    ];

    // Quan hệ ngược tới PhucLoi
    public function phucLois()
    {
        return $this->belongsTo(PhucLoi::class, 'maPhucLoi', 'maPhucLoi');
    }

    // Quan hệ ngược tới NhanVien
    public function nhanViens()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}
