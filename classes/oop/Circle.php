<?php
require_once "PlannerShapes.php";

/**
 * Class Circle
 * Represents a circle shape and calculates its area.
 * This class extends PlannerShapes to demonstrate polymorphism.
 */
class Circle extends PlannerShapes
{
    /**
     * The radius of the circle.
     * @var float
     */
    private float $radius;

    /**
     * Constructor to initialize circle radius.
     *
     * @param float $radius The radius of the circle.
     */
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    /**
     * Calculates and returns the area of the circle.
     *
     * @return float The area of the circle.
     */
    public function getArea(): float
    {
        return pi() * pow($this->radius, 2);
    }
}
?>