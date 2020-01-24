<?php

/**
 * Strategy Design Pattern
 *  is a behavioral design pattern that turns a set of behaviors into objects
 *  and makes them interchangeable inside original context object.
 */

// encapsulate and make them interchangeable
interface Logger
{
    public function log($data);
}

// Define a family of algorithms
class LogToFile implements Logger
{
    public function log($data)
    {
        return 'Log the data to file.';
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        return 'Log the data to database.';
    }
}

class LogToXWebService implements Logger
{
    public function log($data)
    {
        return 'Log the data to sass web service.';
    }
}

class App
{
    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?: new LogToFile;
        return $logger->log(['data' => $data, 'timestamp' => date('m/d/Y h:i:s a')]);
    }
}

// Client code..
$app = new App();
echo $app->log('Some information here') . PHP_EOL;
echo $app->log('Some information here', new LogToDatabase) . PHP_EOL;
echo $app->log('Some information here', new LogToXWebService) . PHP_EOL;
