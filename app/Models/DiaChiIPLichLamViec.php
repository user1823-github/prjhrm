<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChiIPLichLamViec extends Model
{
    use HasFactory;

    protected $table = 'diachiip_lichlamviec';
    protected $primaryKey = 'maDCIPLLV'; // nếu dùng auto-increment id

    public $timestamps = true;

    protected $fillable = [
        'maDCIP',
        'maLLV',
        'trangThai',
    ];

    // Quan hệ ngược tới DiaChiIP
    public function diaChiIPs()
    {
        return $this->belongsTo(DiaChiIP::class, 'maDCIP', 'maDCIP');
    }

    // Quan hệ ngược tới LichLamViec
    public function lichLamViecs()
    {
        return $this->belongsTo(LichLamViec::class, 'maLLV', 'maLLV');
    }
}
