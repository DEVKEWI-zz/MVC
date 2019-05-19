<?php
/**
 * Gerenciador de base da dados
 */
class Database {
	
	private static $connection = null;

	public function getInstance()	{
		if(is_null(self::$connection)) {
			$mysql = unserialize(mysql);
			self::$connection = new PDO('mysql:host=' . $mysql['host'] . ';dbname=' . $mysql['db'] . ';charset=utf8', $mysql['user'], $mysql['pass']);
		}
		return self::$connection;
	}

	public function query($sql, $data = []) 	{
		$stmt = $this->getInstance()->prepare($sql);
		foreach($data as $param => $value) {
			$value = test_input($value);
			$stmt->bindValue($param, $value);
		}
		$stmt->execute();
		return $stmt->fetch();
	}
}