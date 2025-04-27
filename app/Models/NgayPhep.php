<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NgayPhep extends Model
{
    use HasFactory;

    protected $table = 'ngayphep';
    protected $primaryKey = 'maNP';
    public $timestamps = true;

    protected $fillable = [
        'namPhep',
        'soNgay',
        'daNghi',
        'conLai',
        'maNV',
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}
