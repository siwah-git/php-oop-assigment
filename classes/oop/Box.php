<?php
 require_once "PlannerShapes.php";

 class Box extends PlannerShapes{
    private $side;

    public function __construct ($side) {
        $this->side = $side;
    }

    public function getArea(){
        return $this->side * $this->side;
    }
 }

?>