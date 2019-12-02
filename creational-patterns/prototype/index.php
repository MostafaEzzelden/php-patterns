<?php

/**
 * Prototype is a creational design pattern that lets you copy existing objects
 * without making your code dependent on their classes.
 *
 * @see https://refactoring.guru/design-patterns/prototype
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
 * The client code.
 */
function clientCode()
{
    echo "<pre/>";
    $author = new Author("John Smith");
    $page = new Page("Tip of the day", "Keep calm and carry on.", $author);


    $page->addComment("Nice tip, thanks!");


    $draft = clone $page;
    echo "Dump of the clone. Note that the author is now referencing two objects.<br>";
    print_r($page);
    print_r($draft);
}

clientCode();
