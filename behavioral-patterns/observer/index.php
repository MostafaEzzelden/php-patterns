<?php

/**
 * Observer is a behavioral design pattern that lets you define a subscription mechanism to notify
 *  multiple objects about any events that happen to the object they’re observing.
 */

function __autoload($class_name)
{
    $file =  __DIR__ . '/classes/' . $class_name . '.php';
    include $file;
}


/**
 * The client code.
 */

$repository = new UserRepository;

$logger = new LogHandler(__DIR__ . "/log.txt");
$mailer = new MailHandler("admin@example.com");

$repository->attach($logger, "*");
$repository->attach($mailer, "users:created");

$repository->initialize();

$user = $repository->createUser([
    "name" => "Mostafa Ezz Eldin",
    "email" => "mostafa@example.com",
]);

$user = $repository->updateUser($user, [
    "name" => "Ali Ahmed"
]);

$repository->deleteUser($user);
