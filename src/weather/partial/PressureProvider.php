<?php

require_once(__DIR__ . '/../../repository/PressureRepository.php');
require_once(__DIR__ . '/PartialProviderInterface.php');
require_once(__DIR__ . '/../../model/Pressure.php');

class PressureProvider implements PartialProviderInterface
{
	private $pressureRepository;
	
	public function __construct()
	{
		$this->pressureRepository = new PressureRepository();
	}
	
	public function getData()
	{
		$rawData = $this->pressureRepository->getData();
		
		$objects = [];
		foreach($rawData as $item) {
			$objects[] = new Pressure(new \DateTime($item['date_time']), $item['pressure']);
		}
		
		return $objects;
	}
}
