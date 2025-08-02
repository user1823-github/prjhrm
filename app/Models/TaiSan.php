<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaiSan extends Model
{
    use HasFactory;

    protected $table = 'taisan';
    protected $primaryKey = 'maTS';
    public $timestamps = true;

    protected $fillable = [
        'tenTaiSan',
        'loaiTaiSan',
        'soLuong',
        'hinhAnh',
        'viTri',
        'ghiChu',
        'trangThai',
        'maNV' // Mã nhân viên quản lý tài sản này,
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }

    public function lichSuCapPhat(): HasMany
    {
        return $this->hasMany(LichSuCapPhat::class, 'maLSCP', 'maLSCP');
    }
}
