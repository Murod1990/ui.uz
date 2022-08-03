<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skauting extends Model
{
    use HasFactory;

    protected $fillabel = [
        'skauting_maydon',
        'skauting_foydalanuvchi',
        'skauting_lavozim',
        'skauting_foto',
    ];
    protected $guarded = [];
}
