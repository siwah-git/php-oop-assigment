<?php

require_once "PlannerShapes.php";

class Triangle extends PlannerShapes{
    private $alas;
    private $tinggi;


    public function __construct($alas, $tinggi){
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    } 

    public function getArea(){
        return 0.5 * $this->alas * $this->tinggi ;
    }
}
?>