<?php

namespace App\Observer\Listeners;

use App\Observer\ObserverInterface;

interface ListenersInterface
{
    public function handle(ObserverInterface $handler, string $event = null, $data = null);
}
