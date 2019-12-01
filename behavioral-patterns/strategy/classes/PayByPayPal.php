<?php


class PayByPayPal implements PayStrategyInterface
{
    public function pay(int $amount)
    {
        echo "Paying " . $amount . " Using PayPal";
    }
}
