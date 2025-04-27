<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';
    protected $primaryKey = 'maNV';
    public $timestamps = true;

    protected $fillable = [
        'hoTen',
        'chucDanh',
        'soDienThoai',
        'email',
        'gioiTinh',
        'ngayVaoLam',
        'tienLuong',
        'ngaySinh',
        'trangThai',
        'maTK',
    ];


    // protected $with = ['taiKhoan'];
    // Thiết lập quan hệ 1-1 với bảng TaiKhoan
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'maTK', 'maTK');
    }

    public function thanhToan(): HasMany
    {
        return $this->hasMany(ThanhToan::class, 'maTT', 'maTT');
    }

    public function lichlamviec()
    {
        return $this->hasMany(LichLamViec::class, 'maNV', 'maNV');
    }

    public function ngayPhep(): hasOne
    {

        return $this->hasOne(NgayPhep::class, 'maNP', 'maNP');
    }

    public function donPhep(): HasMany
    {

        return $this->hasMany(DonPhep::class, 'maDP', 'maDP');
    }

    public function phieuLuong(): hasOne
    {

        return $this->hasOne(PhieuLuong::class, 'maPL', 'maPL');
    }
}
