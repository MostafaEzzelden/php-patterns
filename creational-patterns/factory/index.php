<?php


function __autoload($class_name)
{
    $file =  __DIR__ . '/classes/' . $class_name . '.php';

    if (!file_exists($file)) {
        throw new \Exception("File  $file not found!");
    }

    include $file;
}

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
