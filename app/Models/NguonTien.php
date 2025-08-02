<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NguonTien extends Model
{
    use HasFactory;

    protected $table = 'nguontien';
    protected $primaryKey = 'maNT';
    public $timestamps = true;

    protected $fillable = [
        'tenNguonTien',
        'loaiNguonTien',
        'soTien',
        'trangThai',
        'ghiChu',
        'maNV' // Mã nhân viên quản lý tài khoản này,
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }

    public function thuChi(): HasMany
    {
        return $this->hasMany(ThuChi::class, 'maGD', 'maGD');
    }
}
