<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LichLamViec extends Model
{
    use HasFactory;

    protected $table = 'lichlamviec';
    protected $primaryKey = 'maLLV';
    public $timestamps = true;

    protected $fillable = [
        'tenCa',
        'ngayLamViec',
        'tgBatDau',
        'tgKetThuc',
        'tgBatDauNghi',
        'tgKetThucNghi',
        'tgCheckInSom',
        'tgCheckOutMuon',
        'heSoLuong',
        'tienThuong',
        'maNV',
        // 'maNL',
        // 'maCTCL',
    ];

    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }

    public function bangCong(): HasOne
    {
        // hasOne(TargetModel::class, foreignKey, localKey)
        return $this->hasOne(BangCong::class, 'maLLV', 'maLLV');
    }

    // public function ngayle()
    // {
    //     return $this->belongsTo(NgayLe::class, 'maNL', 'maNL');
    // }

    // public function chitietcalam()
    // {
    //     return $this->hasOne(ChiTietCaLam::class, 'maCTCL', 'maCTCL');
    // }
}
