<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiLieu extends Model
{
    use HasFactory;

    protected $table = 'tailieu';
    protected $primaryKey = 'maTL';
    public $timestamps = true;

    protected $fillable = [
        'tieuDe',
        'url',
        'tgBatDau',
        'tgKetThuc',
    ];
}
