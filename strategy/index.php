<?php


function __autoload($class_name)
{
    include __DIR__ . '/classes/' . $class_name . '.php';
}


$cart = new ShoppingCart(5000);

$cart->payAmount();
