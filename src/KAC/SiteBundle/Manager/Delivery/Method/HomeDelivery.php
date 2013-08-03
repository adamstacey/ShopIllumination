<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

use KAC\SiteBundle\Manager\Delivery\ShippableInterface;

class HomeDelivery extends AbstractDeliveryMethod
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
        if($zone === 1 && in_array($band, array(3, 4, 5, 6))) {
            return true;
        } elseif($zone === 2 && in_array($band, array(3, 4, 5, 6))) {
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
        if($zone === 1) {
            if($band == 3 || $band == 4) {
                return 19.95;
            } elseif ($band == 5 || $band == 6) {
                return 35;
            }
        } elseif($zone === 2) {
            if($band == 3 || $band == 4) {
                return 29;
            } elseif ($band == 5 || $band == 6) {
                return 45;
            }
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
        if ($zone === 1 && in_array($band, array(3, 4, 5))) {
            return array(
                'start' => 5,
                'end' => 10,
            );
        } elseif ($zone === 1 && in_array($band, array(6))) {
            return array(
                'start' => 5,
                'end' => 12,
            );
        } elseif ($zone === 2 && in_array($band, array(3, 4, 5))) {
            return array(
                'start' => 5,
                'end' => 14,
            );
        } elseif ($zone === 2 && in_array($band, array(6))) {
            return array(
                'start' => 7,
                'end' => 16,
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
        return 'Home Delivery Service';
    }

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription()
    {
        return 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
    }
}