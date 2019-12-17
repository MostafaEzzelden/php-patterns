<?php

interface PaymentInterFace
{
    public function pay(int $amount): string;
}

class DefaultPayment implements PaymentInterFace
{
    public function pay(int $amount): string
    {
        return "Paying Via Default Payment Method: " . $amount;
    }
}

class PayPal
{
    public function sendPayment(int $amount): string
    {
        return "Paying Via PayPal CDN: " . ($amount + 5);
    }
}

class Visa
{
    public function doPayment(int $amount): string
    {
        return "Paying Via Visa CDN :" . ($amount + 9);
    }
}

class PayPalAdapter implements PaymentInterFace
{
    private $payPalProvider;

    public function __construct()
    {
        $this->payPalProvider = new PayPal();
    }

    public function pay(int $amount): string
    {
        return $this->payPalProvider->sendPayment($amount);
    }
}

class VisaAdapter implements PaymentInterFace
{
    private $visaProvider;

    public function __construct()
    {
        $this->visaProvider = new Visa();
    }

    public function pay(int $amount): string
    {
        return $this->visaProvider->doPayment($amount);
    }
}

// Client code...
function clientCode(PaymentInterFace $payment, int $amount): void
{
    echo $payment->pay($amount) . PHP_EOL;
}

$amount = 1000;
$defaultPayment = new DefaultPayment();

$payPal = new PayPalAdapter();
$visa = new VisaAdapter();

clientCode($defaultPayment, $amount);
clientCode($payPal, $amount);
clientCode($visa, $amount);

