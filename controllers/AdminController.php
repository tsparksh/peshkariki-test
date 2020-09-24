<?php

namespace App\Controllers;

use App\Models\Task;

class AdminController extends Controller
{
	public function __construct(){
		session_start();
		if(!$_SESSION["is_admin"]){ // Проверяем авторизован ли администратор для всех методов контроллера
			redirect("admin/login");
			die();
		}
	}

	public function index(){
		$perPage = 5;
		$pages = Task::pagesCount($perPage);
		
		if(!isset($_GET['page']) || $_GET['page'] > $pages){
			$page = 1;
		}
		else{
			$page = (int)$_GET['page'];
		}

		$tasks = Task::getPaginated($perPage, $page);

		$title = 'Админ панель';
		return view('admin/tasks', compact('tasks', 'count', 'title', 'page', 'pages'));
	}
}