<?php


class ProductOrderFacade
{
    private $productId;

    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    public function generateOrder()
    {
        // check quantity product
        if ($this->qtyCheck()) {
            // Add product to card
            $this->addToCart();
            // calculate shipping charge
            $this->calculateShipping();
            // calculate discount
            $this->applyDiscount();
            // save order
            $this->placeOrder();
        }
    }

    private function qtyCheck()
    {
        // check in database
        return 100;
    }

    private function addToCart()
    {
        $cart = new Cart($this->productId);
        $cart->addToCart();
    }

    private function calculateShipping()
    {
        $shipping = new ShippingCharge();
        $shipping->updateCharge();
    }

    private function applyDiscount()
    {
        $discount = new Discount();
        $discount->applyDiscount();
    }

    private function placeOrder()
    {
        $order = new Order();
        $order->generateOrder();
    }
}
