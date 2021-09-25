<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Модель для работы с таблицей списка водобаз в регионах
class Waterbases extends Model
{
    protected $fillable = [
        'uuid', 'name', 'region_uuid'
    ];

    /**
     * Возвращает список водобаз в регионе
     *
     * @param $regionId
     * @param $city
     * @return string
     */
    static public function getListWaterbasesByRegionId($regionId, $city): string
    {
        // Получаем список водобаз по uuid региона
        $listWaterbases = self::query()
            ->where('region_uuid', $regionId)
            ->get()
            ->toArray();

        if (count($listWaterbases) == 0) {
            $message = 'Водобазы для города ' . $city . " не найдены\n";
        } else {
            $message = 'Водобазы города: ' . $city . "\n\n";

            // Формируем читаемый список водобаз региона
            foreach ($listWaterbases as $item) {
                $item = (array)$item;
                $message .= $item['name'] . "\n";
            }
        }

        return $message;
    }
}
