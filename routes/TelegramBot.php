<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function($router) {
    $router->post('webhook', 'TelegramBotController@webhook');
    $router->post('entrypoint', 'TelegramBotController@entrypoint');
});
