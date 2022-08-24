<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class TelegramBotController extends Controller
{
    /**
     * Установка веб хука для Телеграм
     */
    public function webhook()
    {
        $response = Http::post('https://api.telegram.org/bot' . getenv('TELEGRAM_TOKEN') . '/setWebhook',
            ['url' => getenv('APP_URL') . '/api/entrypoint']
        );

        print_r($response->body());
    }

    /**
     * Метод принимает все запросы от Телеграм
     */
    public function entrypoint()
    {
        // Разбираем входные данные от телеграм
        $request = request()->toArray();

        $chat_id = $request['message']['from']['id'];
        // Делим сообщение на две части - команду и ее параметр
        $message = explode(' ', $request['message']['text'], 2);

        if ($message['0'] == '/start') {
            $response = $this->run(new StartController());
        } elseif ($message['0'] == '/help') {
            $response = $this->run(new HelpController());
        } elseif ($message['0'] == '/waterbases') {
            $response = $this->run(new WaterbasesController(), $message['1']);
        } elseif ($message['0'] == '/volumes') {
            $response = $this->run(new VolumesController(), $message['1']);
        } else {
            $response = 'Неизвестная команда';
        }

        // Отправка полученного сообщение в Телеграм
        Http::post('https://api.telegram.org/bot' . getenv('TELEGRAM_TOKEN') . '/sendMessage',
            ['chat_id' => $chat_id, 'text' => $response]
        );
    }
}
