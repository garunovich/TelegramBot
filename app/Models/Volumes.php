<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Модель для таблицы с остатками на водобазе
class Volumes extends Model
{
    protected $fillable = [
        'waterbases_uuid', 'volumes'
    ];

    /**
     * Возвращает остатки на водобазы
     *
     * @param $name
     * @return string
     */
    static public function getVolumeByWaterbaseName($name): string
    {
        // Получаем остатки воды на водобазе, через выборку из двух таблиц по uuid
        $volume = self::query()->select('volume')
            ->join('waterbases', 'waterbases.uuid', '=', 'volumes.waterbase_uuid')
            ->where('name', $name)
            ->get()
            ->toArray();

        if (count($volume) == 0) {
            $message = "Водобаза не найдена\n";
        } else {
            $volume = (array)$volume['0'];
            $message = $name . ' - ' . $volume['volume'] . " тонн\n";
        }

        return $message;
    }
}
