<?php

namespace App\Controllers;

use App\Models\Task;

class PagesController extends Controller
{
	public function index(){

		$perPage = 3; // Количество элементов на страницу
		$pages = Task::pagesCount($perPage);
		
		if(!isset($_GET['page']) || $_GET['page'] > $pages){
			$page = 1;
		}
		else{
			$page = (int)$_GET['page'];
		}

		if(isset($_GET['orderBy']) && isset($_GET['direction'])){
			$tasks = Task::getPaginated($perPage, $page, $_GET['orderBy'], $_GET['direction']);
		}
		else{
			$tasks = Task::getPaginated($perPage, $page);
		}

		$title = 'Главная страница';
		return view('tasks', compact('tasks', 'count', 'title', 'page', 'pages'));
	}
}