<?php

require_once(__DIR__ . '/AbstractWeatherRepository.php');

class TemperatureRepository extends AbstractWeatherRepository
{
	public function getData()
	{
		$query = $this->getConnection()->prepare('SELECT date_time, temperature FROM temperature');
		$query->execute();
		
		return $query->fetchAll();
	}
}
