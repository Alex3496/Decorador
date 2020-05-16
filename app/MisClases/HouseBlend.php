<?php  

namespace App\MisClases;
/**
 * 
 */
class HouseBlend extends Beverage
{
	
	function __construct()
	{
		$this->description = "House Blend Coffe";
	}

	function getCost()
	{
		return .89;
	}
}
?>