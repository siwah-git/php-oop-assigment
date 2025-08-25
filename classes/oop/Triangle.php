<?php
/**
 * Class Triangle
 * Represents a triangle shape and calculates its area.
 */
class Triangle extends PlannerShapes
{
    /**
     * @var float The base length of the triangle.
     */
    private $base;

    /**
     * @var float The height of the triangle.
     */
    private $height;

    /**
     * Triangle constructor.
     *
     * @param float $base   The base length of the triangle.
     * @param float $height The height of the triangle.
     */
    public function __construct(float $base, float $height)
    {
        $this->base = $base;
        $this->height = $height;
    }

    /**
     * Calculates and returns the area of the triangle.
     *
     * @return float The area of the triangle.
     */
    public function getArea(): float
    {
        return 0.5 * $this->base * $this->height;
    }
}
?>