<?php

class PayByCC implements PayStrategyInterface
{
    public function pay(int $amount)
    {
        echo "Paying " . $amount . " Using Credit Card";
    }
}