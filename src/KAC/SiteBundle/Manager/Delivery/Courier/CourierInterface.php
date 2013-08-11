<?php
namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\DependencyInjection\ContainerInterface;

interface CourierInterface
{
    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName();

    /**
     * Process the delivery
     *
     * @param Order $order The order that the delivery belongs to.
     * @param $data
     * @param $container
     *
     * @return mixed
     */
    function process(Order $order, &$data, ContainerInterface $container);

    /**
     * Process the delivery tracking files
     *
     * @param $data
     * @param $container
     *
     * @return mixed
     */
    function processTracking(&$data, ContainerInterface $container);
}