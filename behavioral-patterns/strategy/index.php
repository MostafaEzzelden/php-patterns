<?php

interface PayInterface
{
    public function pay(int $amount): string;
}

class PayByPayPal implements PayInterface
{
    public function pay(int $amount): string
    {
        return "Paying " . ($amount + 15) . " Using PayPal";
    }
}

class PayByCC implements PayInterface
{
    public function pay(int $amount): string
    {
        return "Paying " . ($amount + 5) . " Using Credit Card";
    }
}

class ShoppingCart
{
    public function payAmount(int $amount, PayInterface $payment = null): string
    {
        $payment = $payment ?: new PayByCC;
        return $payment->pay($amount);
    }
}

// Client Code...
$cart = new ShoppingCart;

echo $cart->payAmount(5000) . PHP_EOL;
echo $cart->payAmount(5000, new PayByPayPal);
