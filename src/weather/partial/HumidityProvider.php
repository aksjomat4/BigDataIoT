<?php

require_once(__DIR__ . '/../../repository/HumidityRepository.php');
require_once(__DIR__ . '/PartialProviderInterface.php');
require_once(__DIR__ . '/../../model/Humidity.php');

class HumidityProvider implements PartialProviderInterface
{
	private $humidityRepository;
	
	public function __construct()
	{
		$this->humidityRepository = new HumidityRepository();
	}
	
	public function getData()
	{
		$rawData = $this->humidityRepository->getData();
		
		$objects = [];
		foreach($rawData as $item) {
			$objects[] = new Humidity(new \DateTime($item['date_time']), $item['humidity']);
		}
		
		return $objects;
	}
}
