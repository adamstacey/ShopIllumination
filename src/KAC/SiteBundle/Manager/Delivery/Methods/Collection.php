<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Manager\Delivery\ShippableInterface;

class Collection extends AbstractDeliveryMethod
{
    /**
     * Check if the delivery method supports a location
     *
     * @param $zone
     * @param $band
     *
     * @return boolean
     */
    function supportsLocation($zone, $band)
    {
        return $zone === 1;
    }

    /**
     * @param $zone
     * @param $band
     * @param ShippableInterface[] $items The items to be shipped
     *
     * @return float
     */
    function calculateCost($zone, $band, $items)
    {
        return 0;
    }

    /**
     * Return an array containing the start and end of the range of days estimated
     * to complete the delivery
     *
     * @param $zone
     * @param $band
     *
     * @return array
     */
    function calculateEstimatedDeliveryDays($zone, $band)
    {
        return array(
            'start' => 0,
            'end' => 0,
        );
    }

    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'Collection';
    }

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription()
    {
        return 'You will need to collect your order from our shop in Nottingham. We will contact you as soon as your order is ready for collection.';
    }
}