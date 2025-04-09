<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaDiemLichLamViec extends Model
{
    use HasFactory;

    protected $table = 'diadiem_lichlamviec';
    protected $primaryKey = null;
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'maDD',
        'maLLV',
        'trangThai',
    ];

    // Quan hệ ngược tới DiaChiIP
    public function diaDiems()
    {
        return $this->belongsTo(DiaDiem::class, 'maDD', 'maDD');
    }

    // Quan hệ ngược tới LichLamViec
    public function lichLamViecs()
    {
        return $this->belongsTo(LichLamViec::class, 'maLLV', 'maLLV');
    }
}
