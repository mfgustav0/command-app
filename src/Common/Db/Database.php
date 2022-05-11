<?php

namespace App\Common\Db;

use App\Common\Db\Connectors\MysqlDatabase;
use \PDO;
use \PDOException;

class Database
{
	private $connector;

	private $connection;

	public function __construct()
	{
		$this->setConnection();
	}

	private function setConnection(): void
	{
		$this->connector = MysqlDatabase::class;

		$this->connection = $this->connector::setConnection();

		if(getenv('APP_ENV') === 'testing') {
			$this->connection->beginTransaction();
		}
	}

	public function execute(string $query, array $params = []): \PDOStatement
	{
		try {
			$statement = $this->connection->prepare($query);
			$statement->execute($params);
			return $statement;
		}catch(PDOException $e){
			die('[Error] ' . $e->getMessage());
		}
	}

	public function insert(string $table, array $values): int
	{
		$keysArray = array_keys($values);
		$fields = implode(',', $keysArray);
		$binds = implode(',', array_pad([], count($keysArray), '?'));

		$query = "INSERT INTO {$table} ({$fields}) VALUES ({$binds})";
		
		$this->execute($query, array_values($values));

		return $this->connection->lastInsertId();
	}

	public function query(string $query): \PDOStatement
	{
		return $this->execute($query);
	}

	public function beginTransaction(): void
	{
		$this->connection->beginTransaction();
	}

	public function rollBack(): void
	{
		$this->connection->rollBack();
	}

	public function __destruct()
	{
		if(getenv('APP_ENV') === 'testing') {
			$this->connection->rollBack();
		}
	}
}