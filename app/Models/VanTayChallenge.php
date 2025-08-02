<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanTayChallenge extends Model
{
    use HasFactory;

    protected $table = 'vantaychallenge';
    protected $primaryKey = 'maVTC';
    public $timestamps = true;

    protected $fillable = [
        'challenge',
        'maNV',
    ];

    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}
