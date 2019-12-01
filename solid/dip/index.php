<?php

/**
 * Dependency Inversion principle (DIP)
 * Entities must depend on abstractions not on concretions.
 * It states that the high level module must not depend on the low level module,
 * but they should depend on abstractions
 */

/**
 * autoload
 *
 * @param string $class_name
 * @return void
 */
function __autoload(string $class_name)
{
    include __DIR__ . '/classes/' . $class_name . '.php';
}


$passwordReminder = new PasswordReminder;

$passwordReminder->setDbConnection(new MySqlConnection);
echo $passwordReminder->validatePassword("123");

echo "<br>";

$passwordReminder->setDbConnection(new MongoConnection);
echo $passwordReminder->validatePassword("123");
