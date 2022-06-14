<?php

namespace App\Common\Db\Connectors;

use \PDO;
use \PDOException;

class MysqlDatabase
{
	public static function setConnection(array $config=[]): PDO
	{
		if(!$config) {
			$config = [
				'host' => getenv('DB_HOST'),
				'database' => getenv('DB_DATABASE'),
				'username' => getenv('DB_USERNAME'),
				'password' => getenv('DB_PASSWORD')
			];
		}

		try {
			$con = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database'];
			$connection = new PDO($con, $config['username'], $config['password']);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $connection;
		}catch(PDOException $e){
			die('[Error] ' . $e->getMessage());
		}
	}
}