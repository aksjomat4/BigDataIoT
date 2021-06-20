<?php

require_once(__DIR__ . '/partial/HumidityProvider.php');
require_once(__DIR__ . '/partial/PressureProvider.php');
require_once(__DIR__ . '/partial/TemperatureProvider.php');

class DataProvider
{
	private $humidityProvider;
	private $pressureProvider;
	private $temperatureProvider;
	
	public function __construct()
	{
		$this->humidityProvider = new HumidityProvider();		
		$this->pressureProvider = new PressureProvider();		
		$this->temperatureProvider = new TemperatureProvider();		
	}
	
	public function getTemperatureData()
	{
		return $this->temperatureProvider->getData();
	}
	
	public function getTemperatureDataForChart()
	{
		return $this->getDataForChart($this->getTemperatureData());
	}
	
	public function getHumidityData()
	{
		return $this->humidityProvider->getData();		
	}
	
	public function getHumidityDataForChart()
	{
		return $this->getDataForChart($this->getHumidityData());
	}
	
	public function getPressureData()
	{
		return $this->pressureProvider->getData();			
	}
	
	public function getPressureDataForChart()
	{
		return $this->getDataForChart($this->getPressureData());
	}
	
	private function getDataForChart(array $data)
	{
		$chartData = [];
		foreach($data as $item) {
			$chartData[] = [ 
				'date' => $item->getDateTime()->format('U'),
				'y' => $item->getValue()
			];
		}
		
		return $chartData;
	}
}
