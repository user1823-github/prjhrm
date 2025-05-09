<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaLam extends Model
{
    use HasFactory;

    protected $table = 'calam';
    protected $primaryKey = 'maCL';
    public $timestamps = true;

    protected $fillable = [
        'tenCa',
        'gioCheckInSom',
        'gioCheckOutMuon'
    ];

    // Một CaLam có nhiều ChiTietCaLam
    public function chiTietCaLams()
    {
        return $this->hasMany(ChiTietCaLam::class, 'maCL', 'maCL');
    }
    public function nhanVien(): HasMany
    {
        return $this->hasMany(NhanVien::class, 'maCL', 'maCL');
    }
}
