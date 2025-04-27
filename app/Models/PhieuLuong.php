<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuLuong extends Model
{
    use HasFactory;

    protected $table = 'phieuluong';
    protected $primaryKey = 'maPL';
    public $timestamps = true;

    protected $fillable = [
        'kieuLuong',
        'trangThaiTT',
        'luongCoBan', // lấy cột tienLuong trong bảng Nhân viên inser vào cột này
        //    Thêm 1 cột kiểu lương ở đây khi ra giao diện
        'luongGio',
        'gioLam',
        'caLam',
        'gioOT',
        'caOT',
        'luongOT',
        'luongHeSo',
        'luongThuong',
        'tongCong',
        'maNV'
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}
