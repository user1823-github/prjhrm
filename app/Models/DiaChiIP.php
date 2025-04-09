<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChiIP extends Model
{
    use HasFactory;

    protected $table = 'diachiip';
    protected $primaryKey = 'maDCIP';
    public $timestamps = true;

    protected $fillable = [
        'tenThietBi',
        'diaChiIP',
        'maLLV',
    ];

    public function lichLamViec()
    {
        return $this->belongsTo(LichLamViec::class, 'maLLV', 'maLLV');
    }
}
