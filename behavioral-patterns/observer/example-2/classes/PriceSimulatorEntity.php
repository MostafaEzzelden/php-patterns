<?php


class PriceSimulatorEntity implements PriceSimulatorRepository
{
    private $currencies;

    public function __construct()
    {
        $this->currencies = [];
    }

    public function addCurrency(Currency $currency): void
    {
        array_push($this->currencies, $currency);
    }

    public function updatePrice(): void
    {
        foreach ($this->currencies as $currency) {
            $currency->update();
        }
    }
}
