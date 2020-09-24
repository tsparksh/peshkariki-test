<?php

function view(string $fileName, $values = []){
	extract($values); // Импортируем переменные из $values в шаблон
	require "views/{$fileName}.php";
}

function redirect(string $url){
	header("Location: /{$url}");
}

// Отрисовка переключателя страниц
function drawPaginator(int $pages, int $page){
	return view('includes/paginator', compact('pages', 'page'));
}

// Функция для добавления и изменения параметров в URI
function paramsUpdateUri($key, $value) {
    parse_str($_SERVER['QUERY_STRING'], $params);
    $params[$key] = $value;
    $uri = '?';
    foreach ($params as $key => $value) {
    	$uri .= "&{$key}={$value}";
    }
    return $uri;
}