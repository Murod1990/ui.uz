<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekon extends Model
{
    use HasFactory;
    protected $fillabel = [
        'polya_kodi',
        'Dzz_maydon',
        'aniqlangan_maydon',
        'ekin_nomi'
    ];
    protected $guarded = [];
}
