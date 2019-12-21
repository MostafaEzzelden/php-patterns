<?php

/**
 * Decorator is a Conceptual pattern that allows adding new behaviors to objects
 * dynamically by placing them inside special wrapper objects.
 *
 * @see https://refactoring.guru/design-patterns/decorator/php/example
 */

interface CarService
{
    public function getCost(): int;

    public function getDescription(): string;
}

class BasicInspection implements CarService
{
    public function getCost(): int
    {
        return 10;
    }

    public function getDescription(): string
    {
        return "Basic service";
    }
}

class OilChange implements CarService
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost(): int
    {
        return $this->carService->getCost() + 30;
    }

    public function getDescription(): string
    {
        return $this->carService->getDescription() . ", and a oil change";
    }
}

class TireRotation implements CarService
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost(): int
    {
        return $this->carService->getCost() + 50;
    }

    public function getDescription(): string
    {
        return $this->carService->getDescription() . ", and a tire rotation";
    }
}

// Client code...

$service = new TireRotation(new OilChange(new BasicInspection()));
echo "*Cost: {$service->getCost()} \n";
echo "*Description: {$service->getDescription()} \n";
