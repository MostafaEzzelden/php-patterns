<?php

class Dollar implements Currency
{
    private $price;

    public function __construct(int $price)
    {
        $this->price = $price;
        echo "Original Dollar Price: {$price}</br>";
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function update(): void
    {
        $this->price += 0.2;

        echo "Dollar Price Updated: {$this->price}</br>";
    }
}
