<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Mixed_;

// Модель для работы с таблицей списка регионов
class Regions extends Model
{
    protected $fillable = [
        'uuid', 'name'
    ];

    /**
     * Возвращает uuid города по имени
     *
     * @param $name
     * @return false|mixed
     */
    static public function getRegionByName($name)
    {
        // Получаем название зоны, через выборку из двух таблиц по uuid региона
        $areaId = Areas::query()->select('region_uuid')
            ->where('area', $name)
            ->join('regions', 'regions.uuid', '=', 'areas.region_uuid')
            ->get()
            ->toArray();

        if (count($areaId) == 0) {
            return false;
        } else {
            $areaId = (array)$areaId['0'];
            return $areaId['region_uuid'];
        }
    }
}
