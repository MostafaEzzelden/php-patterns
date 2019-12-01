<?php


interface PriceSimulatorRepository
{
    public function addCurrency(Currency $currency): void;

    public function updatePrice(): void;
}
