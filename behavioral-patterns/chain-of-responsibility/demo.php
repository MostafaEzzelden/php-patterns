<?php

/**
 * Chain of Responsibility is a behavioral design pattern that lets you pass requests along a chain of handlers.
 * Upon receiving a request, each handler decides either to process the request or to pass it
 * to the next handler in the chain.
 */

abstract class HomeChecker
{
    /**
     * @var null
     */
    protected $successors;

    /**
     * @param HomeStatus $home
     * @return void
     */
    public abstract function check(HomeStatus $home): void;

    /**
     * @param HomeChecker $successors
     * @return void
     */
    public function setSuccessors(HomeChecker $successors)
    {
        $this->successors = $successors;
    }

    /**
     * @param HomeStatus $home
     * @return void
     */
    public function next(HomeStatus $home): void
    {
        if ($this->successors) {
            $this->successors->check($home);
        }
    }
}

class Locks extends HomeChecker
{
    /**
     * @param HomeStatus $home
     * @return void
     */
    public function check(HomeStatus $home): void
    {
        if (!$home->locked) {
            throw new Exception('The doors are not locked!!');
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker
{
    /**
     * @param HomeStatus $home
     * @return void
     */
    public function check(HomeStatus $home): void
    {
        if (!$home->alarmOn) {
            throw new Exception('The alarm has not been set!!');
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker
{
    /**
     * @param HomeStatus $home
     * @return void
     */
    public function check(HomeStatus $home): void
    {
        if (!$home->lightsOff) {
            throw new Exception('The lights still are on!!');
        }

        $this->next($home);
    }
}

class HomeStatus
{
    /**
     * check the doors status
     * @var boolean
     */
    public $locked = true;

    /**
     * check the alarm status
     * @var boolean
     */
    public $alarmOn = true;

    /**
     * check the lights status
     * @var boolean
     */
    public $lightsOff = false;
}

// Client Code ...
$locks =  new Locks;
$alarm = new Alarm;
$lights = new Lights;

$locks->setSuccessors($alarm);
$alarm->setSuccessors($lights);

$locks->check(new HomeStatus);
