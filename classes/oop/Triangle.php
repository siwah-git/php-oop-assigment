<?php

require_once "PlannerShapes.php";

class Triangle extends PlannerShapes{
    private $base;
    private $height;


    public function __construct($base, $height){
        $this->base = $base;
        $this->height = $height;
    } 

    public function getArea(){
        return 0.5 * $this->height * $this->base;
    }
}
?>