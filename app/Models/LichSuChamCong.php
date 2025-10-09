<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuChamCong extends Model
{
    use HasFactory;

    protected $table = 'lichsuchamcong';
    protected $primaryKey = 'maLSChamCong';
    public $timestamps = true;

    protected $fillable = [
        // Chấm đầu ca
        'viDoCheckIn',
        'kinhDoCheckIn',
        'diaChiIPCheckIn',
        'hinhAnhCheckIn',
        // Chấm ra giữa ca
        'viDoCheckMidOut',
        'kinhDoCheckMidOut',
        'diaChiIPCheckMidOut',
        'hinhAnhCheckMidOut',
        // Chấm vào giữa ca
        'viDoCheckMidIn',
        'kinhDoCheckMidIn',
        'diaChiIPCheckMidIn',
        'hinhAnhCheckMidIn',
        // Chấm cuối ca
        'viDoCheckOut',
        'kinhDoCheckOut',
        'diaChiIPCheckOut',
        'hinhAnhCheckOut',
        'maBC'
    ];

    public function bangCong()
    {
        return $this->belongsTo(BangCong::class, 'maBC', 'maBC');
    }
}
