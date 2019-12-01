<?php

/**
 * Liskov substitution principle (LSP)
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
$rectangle = new Rectangle;
$rectangle->setWidth(100);
$rectangle->setHeight(200);

var_dump($rectangle->calculateArea());
