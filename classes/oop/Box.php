<?php
 require_once "PlanarShapes.php";

 class Box extends PlanarShapes {
    private $sisi;

    public function __construct ($sisi) {
        $this->sisi = $sisi;
    }

    public function getArea(){
        return $this->sisi * $this->sisi;
    }
 }

?>