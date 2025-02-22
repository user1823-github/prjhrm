<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopThoai extends Model
{
    use HasFactory;

    protected $table = 'hopthoai';
    protected $primaryKey = 'maHT';
    public $timestamps = true;

    protected $fillable = [
        'tieuDe',
        'noiDung',
        'url',
        'soLanHienThi',
        'tgBatDau',
        'tgKetThuc',
        'iconHienThi'
    ];
}
