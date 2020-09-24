<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
	public function create(){
		if($_POST['username'] && $_POST['email'] && $_POST['text']){
			Task::create(($_POST['username']), $_POST['email'], $_POST['text']);
		}
		return redirect('');
	}

	public function update(){
		if($_POST['id'] && $_POST['text']){
			$completed = ($_POST['completed'] == 'on' ? true : false); // Чекбокс не отправляется, если не отмечен
			Task::update($_POST['text'], $completed, $_POST['id']);
			redirect('admin');
		}
	}
}