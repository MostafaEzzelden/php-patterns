<?php

/**
 * Singleton is a creational design pattern that lets you ensure that a class has
 * only one instance, while providing a global access point to this instance.
 *
 * @see https://refactoring.guru/design-patterns/singleton
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
