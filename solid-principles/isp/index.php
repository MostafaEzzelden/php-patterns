<?php

/**
 * Interface segregation principle (ISP)
 * A client should never be forced to implement an interface that it dose not use
 * or clients should not be forced to depend on methods they do not use.
 */

interface ManageableInterface
{
    public function beManage();
}
interface WorkableInterface
{
    public function work();
}
interface SleepableInterface
{
    public function sleep();
}

class HumanWorker implements WorkableInterface, SleepableInterface, ManageableInterface
{
    public function work()
    {
        return 'Human working';
    }

    public function sleep()
    {
        return 'Human sleeping';
    }

    public function beManage()
    {
        $this->work();
        $this->sleep();
    }
}

class AndroidWorker implements WorkableInterface, ManageableInterface
{
    public function work()
    {
        return 'Android working';
    }

    public function beManage()
    {
        $this->work();
    }
}

class Captain
{
    public function manage(ManageableInterface $worker)
    {
        $worker->beManage();
    }
}

// Client code...
$humanWorker = new HumanWorker;
$androidWorker = new AndroidWorker;

$captain = new Captain;
$captain->manage($humanWorker);
$captain->manage($androidWorker);
