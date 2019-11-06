<?php


function __autoload($class_name)
{
    include __DIR__ . '/classes/' . $class_name . '.php';
}



// $email = new Email();
// $email->loadConfig();
// echo "<br>";

// $email = new ChristmasEmailBody($email);
// $email->loadConfig();
// echo "<br>";

// $email = new NewYearEmailBody($email);
// $email->loadConfig();


$email = new Email();

$email = new ChristmasEmail($email);

$email = new NewYearEmail($email);

echo "<pre>";

print_r($email->loadConfig());

