<?php

namespace App\App;
use \PDO;

// Класс для работы с базой данных
class Database
{
	public static $pdo;
	public static $stmt;

	public static function execute(string $command, $params = []){
		self::connect(); // Создаём соединение либо подключаемся к существующему
		self::$stmt = self::$pdo->prepare($command);
		self::bindParams($params); // Биндим все параметры в соответсвующие типы
		self::$stmt->execute();
		return self::$stmt->fetchAll();
	}

	protected static function connect(){
		try{
			self::$pdo = new PDO('mysql:host=localhost;dbname=mvctodo', 'root', 'root', [PDO::ATTR_PERSISTENT => true]); // Создаём постоянное соединение
		}
		catch (Exception $e){
			die("Ошибка при подключении к базе данных.");
		}
	}

	protected static function bindParams(array $params){
		foreach ($params as $key => $value) {
			switch (true) {
				case is_bool($value):
				    $var_type = PDO::PARAM_BOOL;
				    break;
				case is_int($value):
				    $var_type = PDO::PARAM_INT;
				    break;
				case is_null($value):
				    $var_type = PDO::PARAM_NULL;
				    break;
				default:
				    $var_type = PDO::PARAM_STR;
			}
			self::$stmt->bindValue($key, $value, $var_type);  // Биндим все параметры в соответствующие типы
		}
	}
}