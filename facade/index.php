<?php


function __autoload($class_name)
{
    include __DIR__ . '/classes/' . $class_name . '.php';
}


$productId = 20;

$order = new ProductOrderFacade($productId);
$order->generateOrder();
