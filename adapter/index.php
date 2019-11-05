<?php


function __autoload($class_name) {
    include __DIR__ . '/classes/' . $class_name . '.php';
}


$paypal = new PayPalAdapter();

$paypal->pay(1000);


$visa = new VisaAdapter();

$visa->pay(5003);
