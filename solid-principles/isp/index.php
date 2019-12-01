<?php

/**
 * Interface segregation principle (ISP)
 * A client should never be forced to implement an interface that it dose not use
 * or clients should not be forced to depend on methods they do not use.
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
