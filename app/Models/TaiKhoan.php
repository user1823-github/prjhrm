<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaiKhoan extends Model
{
    use HasFactory;

    protected $table = 'taikhoan'; // Tên bảng
    protected $primaryKey = 'maTaiKhoan'; // Khóa chính
    public $timestamps = true;

    protected $fillable = [
        'tenTaiKhoan',
        'matKhau',
        'quyenHan',
    ];

    protected $hidden = [
        'matKhau', // Ẩn mật khẩu khi trả về JSON
    ];

    public function nhanVien(): BelongsTo
    {

        return $this->BelongsTo(NhanVien::class, 'maTaiKhoan', 'maTaiKhoan');
    }
}
