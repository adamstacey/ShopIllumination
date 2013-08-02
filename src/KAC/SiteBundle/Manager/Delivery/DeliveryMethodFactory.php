<?php

namespace KAC\SiteBundle\Manager\Delivery;

use KAC\SiteBundle\Manager\Delivery\Courier\DeliveryMethodInterface;

class DeliveryMethodFactory {
    public function getMethods($zone, $band)
    {
        $methods = array();

        foreach($this->getMethodClasses() as $class)
        {
            /**
             * @var DeliveryMethodInterface $method
             */
            $method = new $class;

            if ($method->supportsLocation($zone, $band))
            {
                $methods[] = $method;
            }
        }
    }

    public function getAllMethods()
    {
        $names = array();

        foreach($this->getMethodClasses() as $class)
        {
            /**
             * @var DeliveryMethodInterface $method
             */
            $method = new $class;
            $names[] = $method->getName();
        }

        return $names;
    }

    private function getMethodClasses()
    {
        return array(
            'KAC\SiteBundle\Manager\Delivery\Method\RoyalMail',
            'KAC\SiteBundle\Manager\Delivery\Method\Parcelforce',
            'KAC\SiteBundle\Manager\Delivery\Method\Palletways',
            'KAC\SiteBundle\Manager\Delivery\Method\HomeDelivery',
            'KAC\SiteBundle\Manager\Delivery\Method\Collection',
        );
    }
} 