<?php

namespace App\Controllers;

class LoginController extends Controller
{

	public function __construct(){
		session_start();
	}

	public function showLogin(){
		return view('admin/login');
	}

	public function checkLogin(){
		$username = 'admin';
		$password = '$2y$12$yCRj5PjFMLRga96k3/nf9egk.SttPXto.Y9FC9lhi1zT.vfLsRpL.'; // Пароль 123

		if($_POST['username'] == $username && $_POST['password'] && password_verify($_POST['password'], $password)){ // Проверяем логин и пароль
			$_SESSION["is_admin"] = true;
			redirect('admin');
		}
		else{
			redirect('admin/login');
		}
	}

	public function logout(){
		$_SESSION["is_admin"] = false;
		redirect('admin/login');
	}
}