<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienCaLam extends Model
{
    use HasFactory;

    protected $table = 'nhanvien_calam';
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'maNV',
        'maCL', 
    ];

    // Quan hệ ngược tới DiaChiIP
    public function nhanViens()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }

    // Quan hệ ngược tới LichLamViec
    public function caLams()
    {
        return $this->belongsTo(CaLam::class, 'maCL', 'maCL');
    }
}
