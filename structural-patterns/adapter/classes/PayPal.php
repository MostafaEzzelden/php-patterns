<?php
class PayPal
{
    public function sendPayment($amount)
    {
        echo "Paying Via PayPal: " . $amount . "<br/>";
    }
}
