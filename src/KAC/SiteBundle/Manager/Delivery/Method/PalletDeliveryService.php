<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

use KAC\SiteBundle\Manager\Delivery\ShippableInterface;

class PalletDeliveryService extends AbstractDeliveryMethod
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
        if(in_array($zone, array(4, 5, 6)) && in_array($band, array(3, 4, 5))) {
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
        if($zone === 4) {
            return 69;
        } elseif($zone === 5) {
            if($band == 3) {
                return 79;
            } elseif ($band == 4 || $band == 5) {
                return 89;
            }
        } elseif($zone === 6) {
            if($band == 3) {
                return 89;
            } elseif ($band == 4 || $band == 5) {
                return 149;
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
        if ($zone === 4 && in_array($band, array(3))) {
            return array(
                'start' => 4,
                'end' => 10,
            );
        } elseif ($zone === 4 && in_array($band, array(4, 5))) {
            return array(
                'start' => 5,
                'end' => 12,
            );
        } elseif ($zone === 5 && in_array($band, array(3))) {
            return array(
                'start' => 4,
                'end' => 10,
            );
        } elseif ($zone === 5 && in_array($band, array(4, 5))) {
            return array(
                'start' => 5,
                'end' => 12,
            );
        } elseif ($zone === 6 && in_array($band, array(3))) {
            return array(
                'start' => 5,
                'end' => 12,
            );
        } elseif ($zone === 6 && in_array($band, array(4, 5))) {
            return array(
                'start' => 5,
                'end' => 14,
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
        return 'Pallet Delivery Service';
    }

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription()
    {
        return 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
    }
}