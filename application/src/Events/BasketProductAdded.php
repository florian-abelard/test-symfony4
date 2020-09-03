<?php

namespace App\Events;

use Symfony\Contracts\EventDispatcher\Event;

class BasketProductAdded extends Event
{
    const NAME = 'basket.product_added';

    private $product;
    private $customer;

    public function __construct($product, $customer)
    {
        $this->product = $product;
        $this->customer = $customer;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getCustomer()
    {
        return $this->customer;
    }
}
