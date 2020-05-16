<?php 

namespace App\MisClases;

abstract class Beverage {

	public $description;

 	function getDescription(){
		return $this->description;
	}

	abstract function getCost();
} 





?> 