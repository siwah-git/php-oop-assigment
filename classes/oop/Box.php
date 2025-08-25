<?php

require_once "PlannerShapes.php";

/**
 * Class Box
 * 
 * Represents a square-shaped box and calculates its area.
 * This class demonstrates polymorphism by overriding getArea()
 * from PlannerShapes.
 */
class Box extends PlannerShapes {
    /**
     * Length of one side of the box.
     * @var float
     */
    private float $side;

    /**
     * Box constructor.
     * 
     * @param float $side Length of one side of the box.
     */
    public function __construct(float $side) {
        $this->side = $side;
    }

    /**
     * Calculate the area of the box.
     * 
     * This method overrides the getArea() method in PlannerShapes.
     * 
     * @return float The area of the box.
     */
    public function getArea(): float {
        return $this->side * $this->side;
    }
}

?>