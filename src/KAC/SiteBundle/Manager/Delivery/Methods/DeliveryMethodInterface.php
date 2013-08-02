<?php
namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Manager\Delivery\ShippableInterface;

interface DeliveryMethodInterface
{
    /**
     * Check if the delivery method supports a location
     *
     * @param $zone
     * @param $band
     *
     * @return boolean
     */
    function supportsLocation($zone, $band);

    /**
     * @param $zone
     * @param $band
     * @param ShippableInterface[] $items The items to be shipped
     *
     * @return float
     */
    function calculateCost($zone, $band, $items);

    /**
     * Return an array containing the start and end of the range of days estimated
     * to complete the delivery
     *
     * @param $zone
     * @param $band
     *
     * @return array
     */
    function calculateEstimatedDeliveryDays($zone, $band);

    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName();

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription();
}