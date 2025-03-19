<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietCaLam extends Model
{
    use HasFactory;

    protected $table = 'chitietcalam';
    protected $primaryKey = 'maCTCL';
    public $timestamps = true;

    protected $fillable = [
        'thuTrongTuan',
        'tgBatDau',
        'tgKetThuc',
        'tgBatDauNghi',
        'tgKetThucNghi',
        'heSoLuong',
        'tienThuong',
        'maCL'
    ];

    // Một ChiTietCaLam thuộc về một CaLam
    public function caLam()
    {
        return $this->belongsTo(CaLam::class, 'maCL', 'maCL');
    }
}
