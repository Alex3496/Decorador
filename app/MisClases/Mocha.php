<?php  

namespace App\MisClases;

use App\MisClases\Beverage;
/**
 * 
 */
class Mocha extends CondimentDecorator
{
	private $beverage;
	
	function __construct(Beverage $beverage)
	{
		$this->beverage = $beverage;
	}

	function getDescription()
	{
		return $this->beverage->getDescription() . ", Mocha";
	}

	function getCost()
	{
		return $this->beverage->getCost() + .20;
	}
}

?>