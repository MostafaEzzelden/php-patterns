<?php


function __autoload($class_name)
{
    include __DIR__ . '/classes/' . $class_name . '.php';
}


function clientCode(EmailInterface $email)
{
    echo "<code style=\"font-weight: bold;\">RESULT: " . $email->load() . "</code>";
}

$email = new Email;
clientCode($email);

echo "<br>";
$email = new ChristmasEmail($email);
$email = new NewYearEmail($email);
clientCode($email);

echo "<br>";

$email = new Email;
$email = new NewYearEmail($email);
$email = new ChristmasEmail($email);
clientCode($email);
