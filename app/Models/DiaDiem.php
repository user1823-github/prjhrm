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
        'viDO',
        'kinhDo',
        'banKinh',
        'banKinh',
    ];

    public function lichLamViec()
    {
        return $this->belongsTo(LichLamViec::class, 'maLLV', 'maLLV');
    }
}
