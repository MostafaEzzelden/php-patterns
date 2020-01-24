<?php

namespace App\Observer;

use App\Observer\ObserverInterface;
use App\Observer\Listeners\ListenersInterface;

class Observer implements ObserverInterface
{
    /**
     * @var array
     */
    private $observers = [];

    public function __construct()
    {
        $this->observers["*"] = [];
    }

    private function initEventGroup(string $event = "*"): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = "*"): array
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers["*"];

        return array_merge($group, $all);
    }

    /**
     * Attach Observers listeners
     *
     * @param ListenersInterface $observer Observer Object
     * @param string $event Event name default [*]
     * @return void
     */
    public function attach(ListenersInterface $observer, string $event = "*"): void
    {
        $this->initEventGroup($event);
        $this->observers[$event][] = $observer;
    }

    public function detach(ListenersInterface $observer, string $event = "*"): void
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    public function notify(string $event = "*", $data = null): void
    {
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->handle($this, $event, $data);
        }
    }
}
