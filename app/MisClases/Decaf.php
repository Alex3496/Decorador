<?php  

namespace App\MisClases;
/**
 * 
 */
class Decaf extends Beverage
{
	
	function __construct()
	{
		$this->description = "Decaf Coffee";
	}

	function getCost()
	{
		return 1.05;
	}
}
?>