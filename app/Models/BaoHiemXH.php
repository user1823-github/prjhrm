<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BaoHiemXH extends Model
{
    use HasFactory;

    protected $table = 'baohiemxh';
    protected $primaryKey = 'maBHXH';
    public $timestamps = true;

    protected $fillable = [
        'maSoBHXH',
        'vung',
        // 'bhxh_NLD', // (8%)
        // 'bhyt_NLD', // (1.5%)
        // 'bhtn_NLD', // (1%)
        // 'bhxh_DN', // (17.5%)
        // 'bhyt_DN', // (3%)
        // 'bhtn_DN', // (1%)
        // 'dpcd_NLD', // Đoàn phí công đoàn NLD Đóng (1%)
        // 'kpcd_DN', // Kinh phí công đoàn DN Đóng (2%)
        'ghiChu',
        'dinhKem',
        'ngayDangKy',
        'maNV'
    ];

    public function nhanVien(): HasOne
    {

        return $this->hasOne(NhanVien::class, 'maNV', 'maNV');
    }
}
