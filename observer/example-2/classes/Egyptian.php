<?php


class Egyptian implements Currency
{
    private $price;

    public function __construct(int $price)
    {
        $this->price = $price;
        echo "Original Egyptian Price: {$price}</br>";
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function update(): void
    {
        $this->price += 60;

        echo "Egyptian Price Updated: {$this->price}</br>";
    }
}
