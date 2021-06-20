<?php

require_once(__DIR__ . '/AbstractWeatherRepository.php');

class HumidityRepository extends AbstractWeatherRepository
{
	public function getData()
	{
		$query = $this->getConnection()->prepare('SELECT date_time, humidity FROM humidity');
		$query->execute();
		
		return $query->fetchAll();
	}
}
