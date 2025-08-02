<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoaiGiaoDich extends Model
{
     use HasFactory;

    protected $table = 'loaigiaodich';
    protected $primaryKey = 'maLGD';
    public $timestamps = true;

    protected $fillable = [
        'tenLoaiGiaoDich',
        'hinhAnhHienThi',
        'ghiChu',
    ];

    public function thuChi(): HasMany
    {
        return $this->hasMany(ThuChi::class, 'maGD', 'maGD');
    }
}
