<?php

class Humidity
{
	private $dateTime;
	private $value;
	
	public function __construct(DateTime $dateTime, float $value)
	{
		$this->dateTime = $dateTime;
		$this->value = $value;
	}
	
	public function getDateTime()
	{
		return $this->dateTime;
	}
	
	public function getValue()
	{
		return $this->value;
	}
}
