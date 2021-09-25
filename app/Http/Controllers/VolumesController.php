<?php

namespace App\Http\Controllers;

use App\Models\Volumes;

// Контроллер для работы с остатками на водобазе
class VolumesController extends Controller
{
    /**
     * Возвращает остатки на водобазе
     *
     * @param string $data
     * @return string
     */
    static public function get(string $data): string
    {
        return Volumes::getVolumeByWaterbaseName(urldecode($data));
    }
}
