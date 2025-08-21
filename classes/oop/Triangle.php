<?php

require_once "PlannerShapes.php";

class Triangle extends PlannerShapes{
    private $base;
    private $heigth;


    public function __construct($base, $heigth){
        $this->base = $base;
        $this->heigth = $heigth;
    } 

    public function getArea(){
        return 0.5 * $this->base  *  $this->heigth = $heigth ;
    }
}
?>