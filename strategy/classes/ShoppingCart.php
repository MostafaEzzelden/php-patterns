<?php


class ShoppingCart
{
    private $amount;

    public function __construct(int $amount = 0)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount(int $amount = 0)
    {
        $this->amount = $amount;
    }

    /**
     * Some Logic Policy
     *
     * @return void
     */
    public function payAmount(): void
    {
        if ($this->amount >= 5000) {
            $apyment = new PayByCC();
        } else {
            $apyment = new PayByPayPal();
        }

        $apyment->pay($this->amount);
    }
}
