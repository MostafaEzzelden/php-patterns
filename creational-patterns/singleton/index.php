<?php

/**
 * Singleton design pattern
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

$application = new Application();

$requestService = $application->getContainer()->getService('request');

$application = $application->getContainer()->getApp();

var_dump($application->getContainer());

$application->setContainer(ServiceContainer::getInstance());

var_dump($application->getContainer());
