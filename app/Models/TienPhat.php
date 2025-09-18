<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TienPhat extends Model
{
    use HasFactory;

    protected $table = 'tienphat';
    protected $primaryKey = 'maTienPhat';
    public $timestamps = true;

    protected $fillable = [
        'tenPhat',
        'loaiPhat', // Bằng văn bản, bằng lời
        'soTien',
        'ngayPhat',
        'ghiChu',
        'trangThai',
    ];

    public function nhanViens()
    {
        return $this->belongsToMany(
            NhanVien::class,
            'tienphat_nhanvien',
            'maTienPhat',
            'maNV'
        );
    }
}
