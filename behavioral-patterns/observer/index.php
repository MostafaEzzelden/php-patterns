<?php

/**
 * Observer is a behavioral design pattern that lets you define a subscription mechanism to notify
 *  multiple objects about any events that happen to the object they’re observing.
 */

require 'vendor/autoload.php';


/**
 * The client code.
 */

$repository = new App\UserRepository;

$logger = new App\LogHandler(__DIR__ . "/log.txt");
$mailer = new App\MailHandler("admin@example.com");

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
