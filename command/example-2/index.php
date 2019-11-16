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

$commandAction = "TurnOffRadio";

$command = new $commandAction(new RadioControl());
$command->execute();
