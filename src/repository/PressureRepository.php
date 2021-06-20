<?php

require_once(__DIR__ . '/AbstractWeatherRepository.php');

class PressureRepository extends AbstractWeatherRepository
{
	public function getData()
	{
		$query = $this->getConnection()->prepare('SELECT date_time, pressure FROM pressure');
		$query->execute();
		
		return $query->fetchAll();
	}
}
