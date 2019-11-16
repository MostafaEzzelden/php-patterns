<?php

function __autoload($class_name)
{
    $file =  __DIR__ . '/classes/' . $class_name . '.php';

    if (!file_exists($file)) {
        throw new \Exception("File  $file not found!");
    }

    include $file;
}


/**
 * The client code.
 */


$priceSimulator = new PriceSimulatorEntity;

$priceSimulator->addCurrency(new Dollar(20));

$priceSimulator->addCurrency(new Ruble(20));

$priceSimulator->addCurrency(new Egyptian(20));

echo "<hr>";


$priceSimulator->updatePrice();
echo "<br/>";
$priceSimulator->updatePrice();
echo "<br/>";
$priceSimulator->updatePrice();
