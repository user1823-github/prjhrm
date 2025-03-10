<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'ngaySinh',
        'trangThai',
        'maTK',
        'maLuong'
    ];


    // protected $with = ['taiKhoan'];
    // Thiết lập quan hệ 1-1 với bảng TaiKhoan
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'maTK', 'maTK');
    }

    public function luong()
    {
        return $this->belongsTo(Luong::class, 'maLuong', 'maLuong');
    }
}
