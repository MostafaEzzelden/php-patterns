<?php

use App\Models\Model;
use App\Repositories\UserRepository;
use App\Observer\Listeners\LogListener;
use App\Observer\Listeners\MailListener;

/**
 * Observer is a behavioral design pattern that lets you define a subscription mechanism to notify
 *  multiple objects about any events that happen to the object they’re observing.
 */

require 'vendor/autoload.php';


/**
 * The client code.
 */

$userRepo = new UserRepository;


$userRepo->attach(new LogListener, "*");
$userRepo->attach(new MailListener("admin@example.com"), "users:created");

$userRepo->initialize();

$user = $userRepo->create([
    "name" => "Mostafa Ezz Eldin",
    "email" => "mostafa@example.com",
]);

$updatedUser = $userRepo->update($user, [
    "name" => "Ali Ahmed"
]);

$userRepo->delete($updatedUser);
