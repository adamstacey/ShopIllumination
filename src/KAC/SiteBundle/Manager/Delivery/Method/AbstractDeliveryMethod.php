<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

use KAC\SiteBundle\Manager\Delivery\Courier\CourierInterface;
use KAC\SiteBundle\Manager\Delivery\DeliveryFactory;

abstract class AbstractDeliveryMethod implements DeliveryMethodInterface
{
    const CUT_OFF_TIME = 12;

    public function calculateEstimatedDeliveryDates($zone, $band)
    {
        // Calculate the weightings and overall band
        $baseEstimatedDeliveryDays = $this->calculateEstimatedDeliveryDays($zone, $band);
        $estimatedDeliveryDates = array('start' => '', 'end' => '', 'requested' => '');

        // Work out next day for delivery option
        $nextDay = $baseEstimatedDeliveryDays['start'];

        // If delivery passes cut off time
        if (date("G") > self::CUT_OFF_TIME)
        {
            $nextDay++;
        }

        // Check if delivery date start does not fall on a Saturday or Sunday
        $weekendDaysToAdd = 0;
        for ($deliveryDateCount = 1; $deliveryDateCount <= $nextDay; $deliveryDateCount++)
        {
            if ((date("l", strtotime("+$deliveryDateCount day")) == 'Saturday') || (date("l", strtotime("+$deliveryDateCount day")) == 'Sunday'))
            {
                $weekendDaysToAdd++;
            }
        }
        $nextDay += $weekendDaysToAdd;

        // Check that start date does not fall on a weekend
        if (date("l", strtotime("+$nextDay day")) == 'Saturday')
        {
            $nextDay += 2;
        } elseif (date("l", strtotime("+$nextDay day")) == 'Sunday') {
            $nextDay++;
        }

        $deliveryStartDate = $nextDay;
        $estimatedDeliveryDatesStart = date("l, jS F Y", strtotime("+$nextDay day"));
        $nextDay = $nextDay + ($baseEstimatedDeliveryDays['end'] - 1);
        $weekendDaysToAdd = 0;
        for ($deliveryDateCount = $deliveryStartDate; $deliveryDateCount <= $nextDay; $deliveryDateCount++)
        {
            if ((date("l", strtotime("+$deliveryDateCount day")) == 'Saturday') || (date("l", strtotime("+$deliveryDateCount day")) == 'Sunday'))
            {
                $weekendDaysToAdd++;
            }
        }
        $nextDay += $weekendDaysToAdd;

        // Check that start date does not fall on a weekend
        if (date("l", strtotime("+$nextDay day")) == 'Saturday')
        {
            $nextDay += 2;
        } elseif (date("l", strtotime("+$nextDay day")) == 'Sunday') {
            $nextDay++;
        }

        $estimatedDeliveryDatesEnd = date("l, jS F Y", strtotime("+$nextDay day"));
        $estimatedDeliveryDates['start'] = $estimatedDeliveryDatesStart;
        $estimatedDeliveryDates['end'] = $estimatedDeliveryDatesEnd;
        $nextDay++;

        $estimatedDeliveryDates['requested'] = date("F d, Y H:i:s", strtotime("+$nextDay day"));

        return $estimatedDeliveryDates;
    }

    /**
     * Get all available couriers for this delivery method
     *
     * @return CourierInterface[]
     */
    function getCouriers()
    {
        $couriers = array();

        foreach($this->getCourierClasses() as $class)
        {
            $couriers[] = DeliveryFactory::loadCourier($class);
        }

        return $couriers;
    }

    /**
     * @inherit
     */
    protected function getCourierClasses()
    {
        return array();
    }
} 