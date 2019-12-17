<?php

/**
 * Single-responsibility Principle
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
