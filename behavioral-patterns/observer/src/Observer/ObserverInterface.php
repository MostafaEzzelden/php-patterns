<?php

namespace App\Observer;

use App\Observer\Listeners\ListenersInterface;

interface ObserverInterface
{
    public function attach(ListenersInterface $observer);
    public function detach(ListenersInterface $observer);
    public function notify(string $event = "*", $data = null);
}
