<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BangCong extends Model
{
    use HasFactory;

    protected $table = 'bangcong';
    protected $primaryKey = 'maBC';
    public $timestamps = true;

    protected $fillable = [
        'tgCheckIn',
        'tgRaGiuaCa',
        'tgVaoGiuaCa',
        'tgCheckOut',
        'maLLV'
    ];

    public function lichLamViec()
    {
        return $this->belongsTo(LichLamViec::class, 'maLLV', 'maLLV');
    }

    public function lichSuChamCong(): HasOne
    {
        return $this->hasOne(LichSuChamCong::class, 'maBC', 'maBC');
    }
}
