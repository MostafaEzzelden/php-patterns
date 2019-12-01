<?php

class MongoConnection implements Database
{
    public function connect(): string
    {
        return "Connect to Mongo database";
    }
}
