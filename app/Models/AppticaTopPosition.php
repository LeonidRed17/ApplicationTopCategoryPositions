<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppticaTopPosition extends Model
{
    use HasFactory;

    // Указываем, какие атрибуты могут быть массово заполняемыми
    protected $fillable = [
        'position',
        'category',
        'subcategory',
        'date_from',
        'date_to',
    ];

}
