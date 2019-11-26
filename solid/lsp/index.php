<?php

/**
 * Liskov substitution principle
 */

/**
 * autoloader
 *
 * @param string $class_name
 * @return void
 */
function __autoload(string $class_name)
{
    include __DIR__ . '/classes/' . $class_name . '.php';
}
