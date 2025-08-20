<?php

require_once "PlannerShapes.php";

class Circle extends PlannerShapes {
    private $radius;

   public function  __construct($radius) {
    $this->radius = $radius;
}
    public function getArea(){
    return pi() * pow($this->radius, 2);
}
}


?>