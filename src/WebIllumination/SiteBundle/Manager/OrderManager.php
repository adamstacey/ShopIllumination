<?php
namespace WebIllumination\SiteBundle\Manager;

use WebIllumination\SiteBundle\Entity\Order;

class OrderManager extends Manager
{
    public function createOrder()
    {
        $product = new Order();

        return $product;
    }
}