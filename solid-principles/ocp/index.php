<?php

declare(strict_types=1);

/**
 * Open Closed Principle
 * Entities should be open for extension, but closed for modification.
 */

class AreaCalculator
{
    public function calculate(array $shapes): float
    {
        $area = [];
        foreach ($shapes as $shape) {
            $area[] = $shape->area();
        }
        return array_sum($area);
    }
}

interface Shape
{
    public function area(): float;
}

class Square implements Shape
{
    private $width;
    private $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area(): float
    {
        return $this->width * $this->height;
    }
}

class Circle implements Shape
{
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function area(): float
    {
        return $this->radius * $this->radius * pi();
    }
}

// Client code...
$shapes = [
    new Square(50, 30),
    new Circle(50),
];
$calculator = new AreaCalculator;
var_dump($calculator->calculate($shapes));
