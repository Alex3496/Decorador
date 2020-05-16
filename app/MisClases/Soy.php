<?php  

namespace App\MisClases;

use App\MisClases\Beverage;
/**
 * 
 */
class Soy extends CondimentDecorator
{
	private $beverage;
	
	function __construct(Beverage $beverage)
	{
		$this->beverage = $beverage;
	}

	function getDescription()
	{
		return $this->beverage->getDescription() . ", Soy";
	}

	function getCost()
	{
		return $this->beverage->getCost() + .15;
	}
}

?>