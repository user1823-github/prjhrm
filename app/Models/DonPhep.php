<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DonPhep extends Model
{
    use HasFactory;

    protected $table = 'donphep';
    protected $primaryKey = 'maDP';
    public $timestamps = true;

    protected $fillable = [
        'ngayTao',
        'loaiNghiPhep',
        'lyDo',
        'ngayNghi',
        'batDauNghi',
        'ketThucNghi',
        'hinhAnh',
        'trangThai',
        'nhanXet',
        'truPhep',
        'maLLV',
        'maNV',
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }

    public function lichLamViec(): HasOne
    {
        // hasOne(TargetModel::class, foreignKey, localKey)
        return $this->hasOne(LichLamViec::class, 'maLLV', 'maLLV');
    }
}
