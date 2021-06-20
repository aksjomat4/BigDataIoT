<?php

require_once(__DIR__ . '/../../config/secret.php');

abstract class AbstractWeatherRepository
{
	private $connection;
	
	public function __construct()
	{
		$this->connection = new PDO(sprintf('mysql:host=%s;dbname=%s', DB_HOST, DB_NAME), DB_USER, DB_PASSWORD);
	}
	
	protected function getConnection()
	{
		return $this->connection;
	}
}
