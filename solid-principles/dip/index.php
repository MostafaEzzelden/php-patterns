<?php

/**
 * Dependency Inversion principle (DIP)
 * Entities must depend on abstractions not on concretions.
 * It states that the high level module must not depend on the low level module,
 * but they should depend on abstractions
 */

interface ConnectionInterface
{
    public function connect(): string;
}

class MongoConnection implements ConnectionInterface
{
    public function connect(): string
    {
        return "Connect to Mongo database";
    }
}

class MySqlConnection implements ConnectionInterface
{
    public function connect(): string
    {
        return "Connect to MySQL database";
    }
}

class PasswordReminder
{
    /**
     * @var ConnectionInterface
     */
    private $dbConnection;

    /**
     * Get the value of dbConnection
     *
     * @return  ConnectionInterface
     */
    public function getDbConnection()
    {
        return $this->dbConnection;
    }

    /**
     * Set the value of dbConnection
     *
     * @param  ConnectionInterface  $dbConnection
     *
     * @return  self
     */
    public function setDbConnection(ConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
        return $this;
    }

    /**
     * @param string $password
     * @return string
     */
    public function validatePassword(string $password)
    {
        $dbConnection = $this->getDbConnection()->connect();
        return  $dbConnection . ' and check if a password (' . $password . ') is a valid password';
    }
}

// Client code...
$passwordReminder = new PasswordReminder;

$passwordReminder->setDbConnection(new MySqlConnection);
var_dump($passwordReminder->validatePassword("secret"));

$passwordReminder->setDbConnection(new MongoConnection);
var_dump($passwordReminder->validatePassword("secret"));
