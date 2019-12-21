<?php

namespace App;

interface EventInterface
{
    public function attach(ObserverInterface $observer);
    public function detach(ObserverInterface $observer);
    public function notify(string $event = "*", $data = null);
}
