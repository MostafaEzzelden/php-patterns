<?php

/**
 * Command is a behavioral design pattern that turns a request into a stand-alone object that
 * contains all information about the request. This transformation lets you parameterize methods
 * with different requests, delay or queue a request’s execution, and support undoubled operations.
 */


require 'vendor/autoload.php';

// Client code..
$queue = App\Queue::get();

if ($queue->isEmpty()) {
    $queue->add(new App\IMDBGenresScrapingCommand);
}

$queue->work();
