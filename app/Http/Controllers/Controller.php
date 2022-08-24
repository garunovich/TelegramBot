<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Выполняет контроллер
     *
     * @param Controller $command
     * @param string $data
     * @return string
     */
    public function run(Controller $command, string $data = ''): string
    {
        return $command::get($data);
    }

    /**
     * Возвращает результат работы контроллера
     *
     * @param string $data
     * @return string
     */
    static public function get(string $data): string
    {
        //
    }
}
