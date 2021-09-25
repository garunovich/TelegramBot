<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use App\Models\Waterbases;

// Контроллер для работы со списком водобаз
class WaterbasesController extends Controller
{
    /**
     * Возвращает список водобаз в регионе
     *
     * @param string $data
     * @return string
     */
    static public function get(string $data): string
    {
        $data = urldecode($data);

        // Ищем регион по uuid
        $regionId = Regions::getRegionByName($data);
        if (!$regionId) {
            $message = 'Город не найден';
        } else {
            // Возвращает список водобаз в регионе
            $message = Waterbases::getListWaterbasesByRegionId($regionId, $data);
        }

        return $message;
    }
}
