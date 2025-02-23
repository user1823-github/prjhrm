<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
