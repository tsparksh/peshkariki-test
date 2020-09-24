<?php

namespace App\Models;

use App\App\Database;

class Task extends Model
{
	public static function create(string $username, string $email, string $text){
		$username = htmlspecialchars($username);
		$email = htmlspecialchars($email);
		$text = htmlspecialchars($text); // Фильтруем теги и возможные XSS-атаки

		return Database::execute('INSERT INTO tasks (username, email, text) VALUES (:username, :email, :text)', compact('username', 'email', 'text'));
	}

	public static function update(string $text, bool $completed, int $id){
		$text = htmlspecialchars($text);
		return Database::execute('UPDATE `tasks` SET `text`=:text,`completed`=:completed WHERE id = :id', compact('text', 'completed', 'id'));
	}

	public static function getAll(){
		return Database::execute('SELECT * FROM tasks ORDER BY id DESC'); // Получаем все записи
	}

	public static function count(){
		return Database::execute('SELECT COUNT(*) from tasks')[0][0]; // Общее количество записей
	}

	public static function pagesCount(int $perPage){
		return ceil(self::count() / $perPage); // Число страниц с заданным количеством элементов на страницу
	}

	public static function getPaginated(int $perPage, int $page){
		$offset = ($page - 1) * $perPage;

		return Database::execute('SELECT * FROM tasks ORDER BY id DESC LIMIT :offset, :perPage', compact('offset', 'perPage')); // Получаем N записей с заданным сдвигом
	}
}
