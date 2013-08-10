<?php
namespace KAC\SiteBundle\Manager\Delivery\Method;

use KAC\SiteBundle\Manager\Delivery\Courier\CourierInterface;
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
     * Return an array containing the start and end of the range of days estimated
     * to complete the delivery
     *
     * @param $zone
     * @param $band
     *
     * @return array
     */
    function calculateEstimatedDeliveryDates($zone, $band);

    /**
     * Get the name of the delivery method
     *
     * @return string
     */
    function getName();

    /**
     * Get the root type
     * For example 'Royal Mail 1st Class' will have the root type of 'Royal Mail'
     *
     * @return string
     */
    function getType();

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription();

    /**
     * Get all available couriers for this delivery method
     *
     * @return CourierInterface[]
     */
    function getCouriers();
}