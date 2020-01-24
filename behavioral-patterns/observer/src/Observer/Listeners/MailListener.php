<?php

namespace App\Observer\Listeners;

use App\Observer\ObserverInterface;
use App\Observer\Listeners\ListenersInterface;

/**
 * This Concrete Component sends initial instructions to new users. The client
 * is responsible for attaching this component to a proper user creation event.
 */
class MailListener implements ListenersInterface
{
    private $adminEmail;

    public function __construct($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function handle(ObserverInterface $handler, string $event = null, $data = null)
    {
        echo "MailHandler: The notification has been emailed!\n";
    }
}
