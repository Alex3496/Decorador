<?php  

namespace App\MisClases;
/**
 * 
 */
class DarkRoast extends Beverage
{
	
	function __construct()
	{
		$this->description = "Dark Roast Coffee";
	}

	function getCost()
	{
		return .99;
	}
}
?>