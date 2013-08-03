<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

use KAC\SiteBundle\Manager\Delivery\ShippableInterface;

class FreeParcelExpress extends AbstractDeliveryMethod
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
        if($zone === 1 && in_array($band, array(2))) {
            return true;
        } elseif($zone === 2 && in_array($band, array(2))) {
            return true;
        } else {
            return false;
        }
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
    function getBaseEstimatedDeliveryDays($zone, $band)
    {
        return array(
            'start' => 1,
            'end' => 5,
        );
    }

    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'FREE DELIVERY Parcel Express';
    }

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription()
    {
        return 'Package sent express service by courier DPD.';
    }

}