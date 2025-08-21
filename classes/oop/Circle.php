<?php

    /** 
     * Used to calculate the area of a circle
    * @var float $radius circle radius
    */

class Circle extends PlannerShapes {
    private $radius;

    /**
     * Constructs a new Circle instance
     * @param float $radius of the circle.
     */

   public function  __construct($radius) {
    $this->radius = $radius;
}

    /**
     *  Calculates and returns the area of ​​the circle
     * @return float The area of ​​the circle.
     */

    public function getArea(){
    return pi() * pow($this->radius, 2); 
}
}

?>