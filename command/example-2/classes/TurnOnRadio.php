<?php

class TurnOnRadio implements RadioCommand
{
    private $radioControl;

    public function __construct(RadioControl $radioControl)
    {
        $this->radioControl = $radioControl;
    }


    public function execute(): void
    {
        $this->radioControl->turnOn();
    }
}
