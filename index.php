<?php

require 'app/bootstrap.php'; //Регистрируем автозагрузку
use App\App\Router;

$router = new Router;

$router->use(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), $_SERVER['REQUEST_METHOD']);
//Перенаправляем все запросы в роутер