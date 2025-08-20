<?php

require_once "PlanarShapes.php";

class Triangle extends PlanarShapes{
    private $alas;
    private $tinggi;


    public function __construct($radius){
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    } 

    public function getArea(){
        return 0.5 * $this->alas * $this->tinggi ;
    }
}
?>