<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuCapPhat extends Model
{
    use HasFactory;

    protected $table = 'lichsucapphat';
    protected $primaryKey = 'maLSCP';
    public $timestamps = true;

    protected $fillable = [
        'ngayTao',
        'soLuongCapPhat',
        'nguoiSudung',
        'ngayNhan',
        'soLuongThuHoi',
        'nguoiThuHoi',
        'ngayThuHoi',
        'nguoiBanGiao',
        'hinhAnh',
        'ghiChu',
        'maTS' // Mã TS của tài sản được cấp phát,
    ];

    public function taiSan()
    {
        return $this->belongsTo(TaiSan::class, 'maTS', 'maTS');
    }
}
