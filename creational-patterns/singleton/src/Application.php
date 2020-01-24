<?php

namespace App;

use App\ServiceContainer;

class Application
{
    private $environments;

    protected $container;

    public function __construct(array $environments = [])
    {
        $this->environments = $environments;
        // lets register a singleton object
        $this->container = ServiceContainer::getInstance();
        $this->container->setApp($this);
        $this->container->registerService('request', 'App\\RequestService');
    }

    public function setContainer(ServiceContainer $container)
    {
        $this->container = $container;
    }

    public function getContainer(): ServiceContainer
    {
        return $this->container;
    }
}
