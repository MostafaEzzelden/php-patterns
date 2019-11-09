<?php


function __autoload($class_name)
{
    include __DIR__ . '/classes/' . $class_name . '.php';
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

echo "Testing FacebookPoster:<br>";
clientCode(SocialPosterFactory::create('facebook', "john_smith", "******"));
echo "<br><br>";


echo "Testing LinkedInPoster:<br>";
clientCode(SocialPosterFactory::create('linkedIn', "john_smith@example.com", "******"));
echo "<br><br>";
