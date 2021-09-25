<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Модель для работы с таблицей зон регионов
class Areas extends Model
{
    protected $fillable = [
        'uuid', 'area', 'region_uuid'
    ];
}
