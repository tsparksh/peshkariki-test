<?php

namespace App\App;

class Router
{
	protected $routes = [
		'GET' => [
			'' => 'PagesController@index',
			'admin' => 'AdminController@index',
			'admin/login' => 'LoginController@showLogin',
			'admin/logout' => 'LoginController@logout',
		],
		'POST' => [
			'task/create' => 'TaskController@create',
			'task/update' => 'TaskController@update',
			'admin/login' => 'LoginController@checkLogin',
		]
	]; // Список маршрутов для каждого метода

	public function use(string $uri, string $method){

		if(array_key_exists($uri, $this->routes[$method])){ // Проверяем существование маршрута
			return $this->callAction(...explode('@', $this->routes[$method][$uri])); // Вызываем соответствующий метод
		}
		
		return view('errors/404'); // Если роута не существует
	}

	protected function callAction($controller, $action){
		$controller = "App\\Controllers\\{$controller}";
		$controller = new $controller;
		// Ищем контроллер и вызываем метод
        return $controller->$action();
	}
}