<?php  

namespace App\MisClases;

use App\MisClases\Beverage;
/**
 * 
 */
class Whip extends CondimentDecorator
{
	private $beverage;
	
	function __construct(Beverage $beverage)
	{
		$this->beverage = $beverage;
	}

	function getDescription()
	{
		return $this->beverage->getDescription() . ", Whip";
	}

	function getCost()
	{
		return $this->beverage->getCost() + .10;
	}
}

?>