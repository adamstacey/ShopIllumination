<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractCourier implements CourierInterface
{
    function process(Order $order, &$data, ContainerInterface $container)
    {
        return;
    }

    public static function processTracking(&$data, ContainerInterface $container)
    {
        return;
    }
}