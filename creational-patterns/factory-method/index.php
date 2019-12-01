<?php

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
function clientCode(SocialNetworkPoster $creator)
{
    // ...
    $creator->post("Hello world!");
    $creator->post("I had a large hamburger this morning!");
    // ...
}

/**
 * During the initialization phase, the app can decide which social network it
 * wants to work with, create an object of the proper subclass, and pass it to
 * the client code.
 */
echo "Testing ConcreteCreator1:\n";
clientCode(new FacebookPoster("john_smith", "******"));
echo "\n\n";

echo "Testing ConcreteCreator2:\n";
clientCode(new LinkedInPoster("john_smith@example.com", "******"));
