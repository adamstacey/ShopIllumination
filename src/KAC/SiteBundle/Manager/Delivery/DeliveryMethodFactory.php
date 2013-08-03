<?php

namespace KAC\SiteBundle\Manager\Delivery;

use KAC\SiteBundle\Manager\Delivery\Method\DeliveryMethodInterface;

class DeliveryMethodFactory {
    /**
     * @param $name
     *
     * @return DeliveryMethodInterface|null
     */
    public static function getMethod($name)
    {
        foreach(self::getMethodClasses() as $class)
        {
            /**
             * @var DeliveryMethodInterface $method
             */
            $method = new $class;

            if ($method->getName() === $name)
            {
                return $method;
            }

            unset($method);
        }

        return null;
    }

    /**
     * @param $zone
     * @param $band
     */
    public static function getMethods($zone, $band)
    {
        $methods = array();

        foreach(self::getMethodClasses() as $class)
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

    /**
     * @return DeliveryMethodInterface[]
     */
    public static function getAllMethods()
    {
        $names = array();

        foreach(self::getMethodClasses() as $class)
        {
            /**
             * @var DeliveryMethodInterface $method
             */
            $method = new $class;
            $names[] = $method->getName();
        }

        return $names;
    }

    /**
     * @return array
     */
    private static function getMethodClasses()
    {
        return array(
            'KAC\SiteBundle\Manager\Delivery\Method\Collection',
            'KAC\SiteBundle\Manager\Delivery\Method\FreePalletExpress',
            'KAC\SiteBundle\Manager\Delivery\Method\FreeParcelExpress',
            'KAC\SiteBundle\Manager\Delivery\Method\FreeRoyalMail',
            'KAC\SiteBundle\Manager\Delivery\Method\HomeDelivery',
            'KAC\SiteBundle\Manager\Delivery\Method\PalletDeliveryEconomy',
            'KAC\SiteBundle\Manager\Delivery\Method\PalletDeliveryExpress',
            'KAC\SiteBundle\Manager\Delivery\Method\PalletDeliveryService',
            'KAC\SiteBundle\Manager\Delivery\Method\ParcelDeliveryEconomy',
            'KAC\SiteBundle\Manager\Delivery\Method\ParcelDeliveryExpress',
            'KAC\SiteBundle\Manager\Delivery\Method\RoyalMailEconomy',
            'KAC\SiteBundle\Manager\Delivery\Method\RoyalMailFirstClass',
        );
    }
} 