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

$repository = new UserEntity;
$repository->attach(new Logger(__DIR__ . "/log.txt"), "*");
$repository->attach(new OnboardingNotification("admin@example.com"), "users:created");

$repository->initialize();

$user = $repository->createUser([
    "name" => "Mostafa Ezz Eldin",
    "email" => "mostafa@example.com",
]);

$user = $repository->updateUser($user, [
    "name" => "Ali Ahmed"
]);

$repository->deleteUser($user);
