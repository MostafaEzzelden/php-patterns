<?php

interface PaymentInterFace
{
    public function pay(int $amount): string;
}

class DefaultPayment implements PaymentInterFace
{
    public function pay(int $amount): string
    {
        return "Paying by Default Payment Method: " . $amount;
    }
}

class PayPal
{
    public function sendPayment(int $amount): string
    {
        return "Paying by PayPal: " . ($amount + 5);
    }
}

class Visa
{
    public function doPayment(int $amount): string
    {
        return "Paying by Visa: " . ($amount + 9);
    }
}

class PayPalAdapter implements PaymentInterFace
{
    private $payPal;

    public function __construct(PayPal $payPal)
    {
        $this->payPal = $payPal;
    }

    public function pay(int $amount): string
    {
        return $this->payPal->sendPayment($amount);
    }
}

class VisaAdapter implements PaymentInterFace
{
    private $visa;

    public function __construct(Visa $visa)
    {
        $this->visa = $visa;
    }

    public function pay(int $amount): string
    {
        return $this->visa->doPayment($amount);
    }
}

class Order
{
    public function create(PaymentInterFace $payment, int $amount)
    {
        var_dump($payment->pay($amount));
    }
}

// Client code...
$order = new Order;
$orderAmount = 1000;
// Default payment method
$order->create(new DefaultPayment, $orderAmount);
// Third-party payment methods
$order->create(new PayPalAdapter(new PayPal), $orderAmount);
$order->create(new VisaAdapter(new Visa), $orderAmount);
