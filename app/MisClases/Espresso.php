<?php 

namespace App\MisClases;

class Espresso extends Beverage
{
	
	function __construct(){
		$this->description = "Espresso";
	}

	function getCost(){
		return 1.99;
	}
}

?>