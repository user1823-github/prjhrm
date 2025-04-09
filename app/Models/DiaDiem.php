<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaDiem extends Model
{
    use HasFactory;

    protected $table = 'diadiem';
    protected $primaryKey = 'maDD';
    public $timestamps = true;

    protected $fillable = [
        'tenDiaDiem',
        'viDo',
        'kinhDo',
        'banKinh',
        'trangThai',
    ];

    public function lichLamViecs()
    {
        return $this->belongsToMany(
            LichLamViec::class,
            'diadiem_lichlamviec',
            'maDD',              
            'maLLV'              
        );
    }
}
