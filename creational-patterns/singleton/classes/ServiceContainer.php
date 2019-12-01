<?php

class ServiceContainer
{
    /**
     * @var null
     */
    private static $instance = null;

    /**
     * @var null
     */
    private $app = null;

    /**
     * @var array
     */
    private $services = [];

    /**
     * @var array
     */
    private $constructors = [];

    private function __construct()
    {
        self::$instance = $this;
    }

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            new ServiceContainer();
        }

        return self::$instance;
    }

    /**
     * @param Application $app
     * @return void
     */
    public function setApp(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return Application
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param string $id
     * @return void
     */
    public function getService(string $id): ServiceProvider
    {
        if (!isset($this->constructors[$id])) {
            throw new \Exception("the service $id dose not registered yet", 1);
        }

        if (!isset($this->services[$id])) {

            if ($this->constructors[$id][1]) {
                $this->services[$id] = new $this->constructors[$id][0]($this->constructors[$id][1]);
            } else {
                $this->services[$id] = new $this->constructors[$id][0];
            }

            $this->services[$id]->setServiceContainer($this);
        }

        return $this->services[$id];
    }

    /**
     * @param string $id
     * @param string $ServiceClass
     * @param array $options
     * @return void
     */
    public function registerService(string $id, string $ServiceClass, array $options = [])
    {
        $this->constructors[$id] = array($ServiceClass, $options);
    }

    public function registerServiceInstance(string $id, ServiceProvider $instance)
    {
        $this->services[$id] = $instance;
    }

    public function clean()
    {
        foreach ($this->services as $service) {
            $service->onRemove();
        }

        $this->services = [];
    }
}
