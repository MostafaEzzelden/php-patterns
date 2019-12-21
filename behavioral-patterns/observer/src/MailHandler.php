<?php

namespace App;

/**
 * This Concrete Component sends initial instructions to new users. The client
 * is responsible for attaching this component to a proper user creation event.
 */
class MailHandler implements ObserverInterface
{
    private $adminEmail;

    public function __construct($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function handle($repository, string $event = null, $data = null): void
    {
        echo "MailHandler: The notification has been emailed!\n";
    }
}
