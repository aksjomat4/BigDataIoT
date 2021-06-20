<?php

require_once(__DIR__ . '/config/secret.php');

function importData(string $tableName, string $valueColumnName, float $minRange, float $maxRange, float $toleranceLevel)
{
	$connection = new PDO(sprintf('mysql:host=%s;dbname=%s', DB_HOST, DB_NAME), DB_USER, DB_PASSWORD);
	$date = (new DateTime())->modify('-1 day')->setTime(0,0,0);
	
	$value = rand($minRange, $maxRange);
	
	for($i=1; $i < 144; $i++) {
		if($i > 1){
			$value = rand(0, 1) == 1 ? $value + $toleranceLevel : $value - $toleranceLevel;	
			if ($value < $minRange){
				$value = $value + (2 * $toleranceLevel);
			}
			
			if ($value > $maxRange){
				$value = $value - (2 * $toleranceLevel);
			}
		}
				
		$query = $connection->prepare(sprintf('INSERT INTO %s (%s, date_time) VALUES (:value, :date_time);', $tableName, $valueColumnName));
		$query->bindValue('value', round($value, 1));
		$query->bindValue('date_time', $date->modify('+10 minute')->format('Y-m-d H:i:s'));
		$query->execute();
	}
}

importData('temperature', 'temperature', 20, 25, 0.1);
importData('humidity', 'humidity', 40, 60, 0.1);
importData('pressure', 'pressure', 980, 1025, 1);

