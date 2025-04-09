<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChiIP extends Model
{
    use HasFactory;

    protected $table = 'diachiip';
    protected $primaryKey = 'maDCIP';
    public $timestamps = true;

    protected $fillable = [
        'tenThietBi',
        'diaChiIP',
        'trangThai',
        // ❌ Không cần 'maLLV' vì quan hệ này thông qua bảng trung gian
    ];

    public function lichLamViecs()
    {
        return $this->belongsToMany(
            LichLamViec::class,
            'diachiip_lichlamviec', // Tên bảng trung gian
            'maDCIP',               // Khóa ngoại ở bảng trung gian trỏ tới DiaChiIP
            'maLLV'                 // Khóa ngoại ở bảng trung gian trỏ tới LichLamViec
        );
    }
}
