<?php


class Application
{
    private $environments;

    protected $container;

    public function __construct(array $environments = [])
    {
        $this->environments = $environments;

        $this->container = ServiceContainer::getInstance(); // lets register a singleton object

        $this->container->setApp($this);

        $this->container->registerService('request', 'RequestService');

        $this->container->registerService('session', 'SessionService');
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
