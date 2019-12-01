<?php


class Ruble implements Currency
{
    private $price;

    public function __construct(int $price)
    {
        $this->price = $price;
        echo "Original Ruble Price: {$price}</br>";
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function update(): void
    {
        $this->price += 20;
        echo "Ruble Price Updated: {$this->price}</br>";
    }
}
