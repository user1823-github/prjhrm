<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CaLam extends Model
{
    use HasFactory;

    protected $table = 'calam';
    protected $primaryKey = 'maCL';
    public $timestamps = true;

    protected $fillable = [
        'tenCa',
        'gioCheckInSom',
        'gioCheckOutMuon'
    ];

    // Một CaLam có nhiều ChiTietCaLam
    public function chiTietCaLams()
    {
        return $this->hasMany(ChiTietCaLam::class, 'maCL', 'maCL');
    }

    public function nhanViens(): BelongsToMany
    {
        return $this->belongsToMany(
            NhanVien::class,
            'nhanvien_calam', // Tên bảng trung gian
            'maCL',           // Khóa ngoại ở bảng trung gian trỏ tới NhanVien
            'maNV'            // Khóa ngoại ở bảng trung gian trỏ tới CaLam
        );
    }
}
