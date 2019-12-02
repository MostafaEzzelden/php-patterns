<?php

/**
 * Factory Method is a creational design pattern that provides an interface for creating objects in a superclass,
 * but allows subclasses to alter the type of objects that will be created.
 *
 * @see https://refactoring.guru/design-patterns/factory-method
 */

/**
 * autoload
 *
 * @param string $class_name
 * @return void
 */
function __autoload(string $class_name): void
{
    $file =  __DIR__ . '/classes/' . $class_name . '.php';

    if (!file_exists($file)) {
        throw new \Exception("File $file not found !");
    }

    include $file;
}


/**
 * The client code can work with any subclass of SocialNetworkPoster since it
 * doesn't depend on concrete classes.
 */
function clientCode(SocialNetworkPoster $poster)
{
    $poster->post("Hello world!");
    $poster->post("I had a large hamburger this morning!");
}

/**
 * During the initialization phase, the app can decide which social network it
 * wants to work with, create an object of the proper subclass, and pass it to
 * the client code.
 */
echo "Testing ConcreteCreator1:<br>";
clientCode(new FacebookPoster("john_smith", "******"));
echo "<br>";

echo "Testing ConcreteCreator2:<br>";
clientCode(new LinkedInPoster("john_smith@example.com", "******"));
