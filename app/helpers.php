<?php

function view(string $fileName, $values = []){
	extract($values); // Импортируем переменные из $values в шаблон
	require "views/{$fileName}.php";
}

function redirect(string $url){
	header("Location: /{$url}");
}

function drawPaginator(int $pages, int $page){
	return view('includes/paginator', compact('pages', 'page'));
}