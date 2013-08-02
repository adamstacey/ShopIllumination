<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Manager\Delivery\ShippableInterface;

class PalletDeliveryExpress extends AbstractDeliveryMethod
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
        if($zone === 3 && in_array($band, array(3, 4, 5))) {
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
        if($zone === 3) {
            if($band == 3) {
                return 39;
            } elseif ($band == 4 || $band = 5) {
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
        return array(
            'start' => 2,
            'end' => 7,
        );
    }

    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'Pallet Delivery Express';
    }

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription()
    {
        return 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
    }
}