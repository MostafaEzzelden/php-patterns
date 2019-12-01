<?php

class PasswordReminder
{
    /**
     * @var Database
     */
    private $dbConnection;

    /**
     * Get the value of dbConnection
     *
     * @return  Database
     */
    public function getDbConnection()
    {
        return $this->dbConnection;
    }

    /**
     * Set the value of dbConnection
     *
     * @param  Database  $dbConnection
     *
     * @return  self
     */
    public function setDbConnection(Database $dbConnection)
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
        $dbConnection = $this->dbConnection->connect();

        return  $dbConnection . ' and check if a password (' . $password . ') is a valid password';
    }
}
