<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VanTay extends Model
{
    use HasFactory;

    protected $table = 'vantay';
    protected $primaryKey = 'maVT';
    public $timestamps = true;

    protected $fillable = [
        'credentialID',
        'authenticatorAttachment',
        'maVTC',
        'maNV',
    ];

    public function vantayChallenges(): HasOne
    {

        return $this->hasOne(VanTayChallenge::class, 'maVTC', 'maVTC');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }

}
