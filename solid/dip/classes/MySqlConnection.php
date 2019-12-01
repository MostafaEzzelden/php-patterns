<?php

class MySqlConnection implements Database
{
    public function connect(): string
    {
        return "Connect to MySQL database";
    }
}
