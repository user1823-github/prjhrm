<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanTay extends Model
{
    use HasFactory;

    protected $table = 'vantay';
    protected $primaryKey = 'maVT';
    public $timestamps = true;

    protected $fillable = [
        'credentialID',
        'authenticatorAttachment',
        'maNV',
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}
