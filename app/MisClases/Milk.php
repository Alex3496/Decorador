<?php  

namespace App\MisClases;

use App\MisClases\Beverage;
/**
 * 
 */
class Milk extends CondimentDecorator
{
	private $beverage;
	
	function __construct(Beverage $beverage)
	{
		$this->beverage = $beverage;
	}

	function getDescription()
	{
		return $this->beverage->getDescription() . ", Milk";
	}

	function getCost()
	{
		return $this->beverage->getCost() + .10;
	}
}

?>