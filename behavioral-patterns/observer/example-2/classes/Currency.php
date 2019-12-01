<?php

interface Currency
{

    public function update(): void;

    public function getPrice(): int;
}
