<?php

/**
 * class Triangle to calculate the area of ​​a triangular shape
 * @var float height of the triangle.
 * @var float base length of the triangle.
 * 
 */
class Triangle extends PlannerShapes{
    private $base;
    private $height;

    /**
     * Constructs a new Triangle instance.
     * 
     * @param base $base of the triangle
     * @param height $height of the tiangle 
     */

    public function __construct($base, $height){
        $this->base = $base;
        $this->height = $height;
    } 

    /**
     *  Calculates and returns the area of ​​the triangle
     */
    public function getArea(){
        return 0.5 * $this->height * $this->base;
    }
}
?>