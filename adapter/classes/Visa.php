<?php


class Visa
{

    public function __construct()
    {
        //
    }

    public function doPayment(int $amount)
    {
        echo "Paying Via Visa: " . $amount . "<br/>";
    }
}
