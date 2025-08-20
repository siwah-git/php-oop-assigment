<?php

require_once "PlanarShapes.php";

class Circle extends PlanarShapes {
    pirvate $radius;
}

public function __construct($radius) {
    $this->radius = $radius;
}

public function getArea(){
    return pi() * pow($this->radius, 2);
}
?>