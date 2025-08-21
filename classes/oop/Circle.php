<?php

 /** 
  * Used to calculate the area of a circle
  * @var float $radius circle radius
 */

class Circle extends PlannerShapes {
    private $radius;

   public function  __construct($radius) {
    $this->radius = $radius;
}

/**
 * Method Executes the FizzBuzz logic and returns the results.
 * @return array An array containing the FizzBuzz results
 */

    public function getArea(){
    return pi() * pow($this->radius, 2); 
}
}


?>