<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

use KAC\SiteBundle\Manager\Delivery\ShippableInterface;

class ParcelDeliveryEconomy extends AbstractDeliveryMethod
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
        if($zone === 3 && in_array($band, array(2))) {
            return true;
        } elseif($zone === 4 && in_array($band, array(2))) {
            return true;
        } elseif($zone === 5 && in_array($band, array(2))) {
            return true;
        } elseif($zone === 6 && in_array($band, array(2))) {
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
        if($zone === 3 || $zone === 4) {
            return 4.95;
        } elseif($zone === 6 || $zone === 5) {
            return 7.95;
        }

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
        if ($zone === 3 && in_array($band, array(2))) {
            return array(
                'start' => 5,
                'end' => 8,
            );
        } elseif ($zone === 4 && in_array($band, array(2))) {
            return array(
                'start' => 5,
                'end' => 10,
            );
        } elseif ($zone === 5 && in_array($band, array(2))) {
            return array(
                'start' => 7,
                'end' => 12,
            );
        } elseif ($zone === 6 && in_array($band, array(2))) {
            return array(
                'start' => 7,
                'end' => 12,
            );
        } else {
            return array(
                'start' => 0,
                'end' => 0,
            );
        }
    }

    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'Parcel Delivery Express';
    }

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription()
    {
        return 'Package sent economy service by courier DPD.';
    }
}