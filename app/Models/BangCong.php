<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangCong extends Model
{
    use HasFactory;

    protected $table = 'bangcong';
    protected $primaryKey = 'maBC';
    public $timestamps = true;

    protected $fillable = [
        'tgCheckIn',
        'tgCheckout',
        'maLLV'
    ];

    public function lichLamViec()
    {
        return $this->belongsTo(LichLamViec::class, 'maLLV', 'maLLV');
    }
}
