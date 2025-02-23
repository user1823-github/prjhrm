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
        'thuTrongCa',
        'tgBatDau',
        'tgKetThuc',
        'tgBatDauNghi',
        'tgKetThucNghi',
        'heSoLuong',
        'tienThuong'
    ];
}
