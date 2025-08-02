<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuChi extends Model
{
    use HasFactory;

    protected $table = 'thuchi';
    protected $primaryKey = 'maGD';
    public $timestamps = true;

    protected $fillable = [
        'ngayTao',
        'tenGiaoDich',
        'loaiGiaoDich',
        'nguoiThuHoacChi',
        'soTien',
        'nguoiNophoacNhan',
        'dinhKem',
        'ghiChu',
        'maLGD', // Mã loại giao dịch
        'maNT', // Mã nguồn tiền
    ];

    public function nguonTien()
    {
        return $this->belongsTo(NguonTien::class, 'maNT', 'maNT');
    }
    public function loaiGiaoDich()
    {
        return $this->belongsTo(LoaiGiaoDich::class, 'maLGD', 'maLGD');
    }
}
