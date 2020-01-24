<?php

namespace App;

use App\Application;
use App\ServiceContainer;

abstract class ServiceProvider
{
    protected $container;

    public function setServiceContainer(ServiceContainer $container)
    {
        $this->container = $container;

        $this->boot();
    }

    public function boot()
    {
        //
    }

    public function onRemove()
    {
        //
    }

    public function getService(string $id): ServiceProvider
    {
        return $this->container->getService($id);
    }

    public function getApp(): Application
    {
        return $this->container->getApp();
    }
}
