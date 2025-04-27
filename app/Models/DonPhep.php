<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonPhep extends Model
{
    use HasFactory;

    protected $table = 'donphep';
    protected $primaryKey = 'maDP';
    public $timestamps = true;

    protected $fillable = [
        'loaiNghiPhep',
        'lyDo',
        'ngayNghi',
        'batDauNghi',
        'ketThucNghi',
        'hinhAnh',
        'trangThai',
        'nguoiDuyet',
        'maNV',
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}
