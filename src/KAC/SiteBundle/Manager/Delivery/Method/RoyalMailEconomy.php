<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

use KAC\SiteBundle\Manager\Delivery\ShippableInterface;

class RoyalMailEconomy extends AbstractDeliveryMethod
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
        if($zone === 1 && in_array($band, array(1))) {
            return true;
        } elseif($zone === 2 && in_array($band, array(1))) {
            return true;
        } elseif($zone === 3 && in_array($band, array(1))) {
            return true;
        } elseif($zone === 4 && in_array($band, array(1))) {
            return true;
        } elseif($zone === 5 && in_array($band, array(1))) {
            return true;
        } elseif($zone === 6 && in_array($band, array(1))) {
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
        if($zone === 1 || $zone === 2) {
            return 1.95;
        } elseif($zone === 3) {
            return 2.95;
        } elseif($zone === 4 || $zone === 5 || $zone === 6) {
            return 3.95;
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
    function getBaseEstimatedDeliveryDays($zone, $band)
    {
        if ($zone === 1) {
            return array(
                'start' => 3,
                'end' => 7,
            );
        } elseif ($zone === 2) {
            return array(
                'start' => 3,
                'end' => 7,
            );
        } elseif ($zone === 3) {
            return array(
                'start' => 4,
                'end' => 8,
            );
        } elseif ($zone === 4) {
            return array(
                'start' => 5,
                'end' => 9,
            );
        } elseif ($zone === 5) {
            return array(
                'start' => 5,
                'end' => 10,
            );
        } elseif ($zone === 6) {
            return array(
                'start' => 6,
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
     * @return string
     */
    function getName()
    {
        return 'Royal Mail Economy';
    }

    /**
     * Get the description of the courier
     * @return string
     */
    function getDescription()
    {
        return 'Small package sent recorded Economy by Royal Mail.';
    }
}