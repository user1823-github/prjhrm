<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ThueTNCN extends Model
{
    use HasFactory;

    protected $table = 'thuetncn';
    protected $primaryKey = 'maTNCN';
    public $timestamps = true;

    protected $fillable = [
        'maSoThue',
        'soNguoiPhuThuoc',
        'soTienGiamTru',
        'ghiChu',
        'dinhKem',
        'ngayDangKy',
        // 'ngayBatDauGiamTru',
        // 'ngayKetThucGiamTru',
        'maNV'
    ];

    public function nhanVien(): HasOne
    {

        return $this->hasOne(NhanVien::class, 'maNV', 'maNV');
    }
}
