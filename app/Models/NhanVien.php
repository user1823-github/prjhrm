<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';
    protected $primaryKey = 'maNhanVien';
    public $timestamps = true; 

    protected $fillable = [
        'hoTen', 'chucDanh', 'soDienThoai', 'email', 'gioiTinh', 'ngayVaoLam', 'ngaySinh'
    ];
}
