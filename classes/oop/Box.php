<?php
 require_once "PlannerShapes.php";

 class Box extends PlannerShapes{
    private $sisi;

    public function __construct ($sisi) {
        $this->sisi = $sisi;
    }

    public function getArea(){
        return $this->sisi * $this->sisi;
    }
 }

?>