<?php

/**
 * Strategy Design Pattern
 *  is a behavioral design pattern that turns a set of behaviors into objects
 *  and makes them interchangeable inside original context object.
 */

interface PaymentInterface
{
    public function pay(int $amount): string;
}

class PayByPayPal implements PaymentInterface
{
    public function pay(int $amount): string
    {
        return "Paying " . ($amount + 15) . " Using PayPal";
    }
}

class PayByCreditCard implements PaymentInterface
{
    public function pay(int $amount): string
    {
        return "Paying " . ($amount + 5) . " Using Credit Card";
    }
}

class ShoppingCart
{
    public function payAmount(int $amount, PaymentInterface $payment = null): string
    {
        $payment = $payment ?: new PayByCreditCard;
        return $payment->pay($amount);
    }
}

// Client Code...
$cart = new ShoppingCart;

echo $cart->payAmount(5000) . PHP_EOL;
echo $cart->payAmount(5000, new PayByPayPal);
