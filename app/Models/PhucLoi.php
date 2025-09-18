<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhucLoi extends Model
{
    use HasFactory;

    protected $table = 'phucloi';
    protected $primaryKey = 'maPhucLoi';
    public $timestamps = true;

    protected $fillable = [
        'tenPhucLoi',
        'loaiPhucLoi', // Bằng văn bản, bằng lời
        'soTien',
        'ngayKhenThuong',
        'hinhThuc', // Thưởng Chuyển khoản, hiện vật, bằng tiền
        'ghiChu',
        'tinhThue',
        'trangThai',
    ];

    public function nhanViens()
    {
        return $this->belongsToMany(
            NhanVien::class,
            'phucloi_nhanvien',
            'maPhucLoi',
            'maNV'
        );
    }
}
