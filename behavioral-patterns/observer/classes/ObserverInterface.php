<?php

interface ObserverInterface
{
    public function handle($repository, string $event = null, $data = null);
}
