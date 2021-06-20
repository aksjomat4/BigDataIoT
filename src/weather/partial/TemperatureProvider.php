<?php

require_once(__DIR__ . '/../../repository/TemperatureRepository.php');
require_once(__DIR__ . '/PartialProviderInterface.php');
require_once(__DIR__ . '/../../model/Temperature.php');

class TemperatureProvider implements PartialProviderInterface
{
	private $temperatureRepository;
	
	public function __construct()
	{
		$this->temperatureRepository = new TemperatureRepository();
	}
	
	public function getData()
	{
		$rawData = $this->temperatureRepository->getData();
		
		$objects = [];
		foreach($rawData as $item) {
			$objects[] = new Temperature(new \DateTime($item['date_time']), $item['temperature']);
		}
		
		return $objects;
	}
}
