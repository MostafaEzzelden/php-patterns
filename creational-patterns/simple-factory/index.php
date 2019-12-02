<?php

/**
 * Simple Factory Pattern This allows interfaces for creating objects
 * without exposing the object creation logic to the client.
 *
 * @see https://code.tutsplus.com/tutorials/design-patterns-the-simple-factory-pattern--cms-22345
 */

/**
 * autoload
 *
 * @param string $class_name
 * @return void
 */
function __autoload(string $class_name)
{
    include __DIR__ . '/classes/' . $class_name . '.php';
}


// Client code
echo "<pre>";

$bmwCar = CarFactory::build(CarFactory::BMW_TYPE);
$sedanCar = CarFactory::build(CarFactory::SEDAN_TYPE);


var_dump($bmwCar);

var_dump($sedanCar);

$notFoundCar = CarFactory::build(3);
