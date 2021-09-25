<?php

namespace App\Http\Controllers;

// Контроллер для команды start
class StartController extends Controller
{
    /**
     * Возвращает приветственный текст
     *
     * @param string $data
     * @return string
     */
    static public function get(string $data): string
    {
        return "Доступные команды:\n/waterbases назывние города (например /waterbases Москва) - выведет все водобазы в городе.\n/volumes название водобазы (например /volumes Звезда ВБ)- выведет остатки воды водобазы.";
    }
}
