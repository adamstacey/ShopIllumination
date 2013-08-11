<?php

namespace KAC\SiteBundle\Manager\Delivery;

use KAC\SiteBundle\Manager\Delivery\Courier\CourierInterface;
use KAC\SiteBundle\Manager\Delivery\Method\DeliveryMethodInterface;

class DeliveryFactory {
    private static $methodCache = array();
    private static $courierCache = array();

    /**
     * @param $name
     *
     * @return DeliveryMethodInterface|null
     */
    public static function getMethod($name)
    {
        foreach(self::getMethodClasses() as $class)
        {
            $method = self::loadMethod($class);

            if ($method->getName() === $name)
            {
                return $method;
            }
        }

        return null;
    }

    /**
     * @param $zone
     * @param $band
     *
     * @return DeliveryMethodInterface[]
    */
    public static function getMethods($zone, $band)
    {
        $methods = array();

        foreach(self::getMethodClasses() as $class)
        {
            $method = self::loadMethod($class);

            if ($method->supportsLocation($zone, $band))
            {
                $methods[] = $method;
            }
        }

        return $methods;
    }

    /**
     * @param $zone
     * @param $band
     *
     * @return string[]
    */
    public static function getMethodNames($zone, $band)
    {
        $names = array();

        foreach(self::getMethodClasses() as $class)
        {
            $method = self::loadMethod($class);

            if ($method->supportsLocation($zone, $band))
            {
                $names[] = $method->getName();
            }
        }

        return $names;
    }

    /**
     * @return string[]
     */
    public static function getAllMethodNames()
    {
        $names = array();

        foreach(self::getMethodClasses() as $class)
        {
            $method = self::loadMethod($class);

            $names[] = $method->getName();
        }

        return $names;
    }

    /**
     * @return DeliveryMethodInterface[]
     */
    public static function getAllMethods()
    {
        $methods = array();

        foreach(self::getMethodClasses() as $class)
        {
            $methods[] = self::loadMethod($class);
        }

        return $methods;
    }

    /**
     * @param $name
     *
     * @return CourierInterface|null
     */
    public static function getCourier($name)
    {
        foreach(self::getCourierClasses() as $class)
        {
            $courier = self::loadCourier($class);

            if ($courier->getName() === $name)
            {
                return $courier;
            }
        }

        return null;
    }

    /**
     * @return string[]
     */
    public static function getAllCourierNames()
    {
        $names = array();

        foreach(self::getCourierClasses() as $class)
        {
            $courier = self::loadCourier($class);

            $names[] = $courier->getName();
        }

        return $names;
    }

    /**
     * @return CourierInterface[]
     */
    public static function getAllCouriers()
    {
        $couriers = array();

        foreach(self::getCourierClasses() as $class)
        {
            $couriers[] = self::loadCourier($class);
        }

        return $couriers;
    }

    public static function loadMethod($class)
    {
        /**
         * @var DeliveryMethodInterface $method
         */
        $method = new $class;

        if(array_key_exists($method->getName(), self::$methodCache))
        {
            $method = self::$methodCache[$method->getName()];
        } else {
            self::$methodCache[$method->getName()] = $method;
        }

        return $method;
    }

    public static function loadCourier($class)
    {
        /**
         * @var CourierInterface $courier
         */
        $courier = new $class;

        if(array_key_exists($courier->getName(), self::$courierCache))
        {
            $courier = self::$courierCache[$courier->getName()];
        } else {
            self::$courierCache[$courier->getName()] = $courier;
        }

        return $courier;
    }

    /**
     * @return array
     */
    private static function getMethodClasses()
    {
        return array(
            'KAC\SiteBundle\Manager\Delivery\Method\FreePalletExpress',
            'KAC\SiteBundle\Manager\Delivery\Method\FreeParcelExpress',
            'KAC\SiteBundle\Manager\Delivery\Method\FreeRoyalMail',
            'KAC\SiteBundle\Manager\Delivery\Method\PalletDeliveryEconomy',
            'KAC\SiteBundle\Manager\Delivery\Method\PalletDeliveryExpress',
            'KAC\SiteBundle\Manager\Delivery\Method\PalletDeliveryService',
            'KAC\SiteBundle\Manager\Delivery\Method\ParcelDeliveryEconomy',
            'KAC\SiteBundle\Manager\Delivery\Method\ParcelDeliveryExpress',
            'KAC\SiteBundle\Manager\Delivery\Method\RoyalMailEconomy',
            'KAC\SiteBundle\Manager\Delivery\Method\RoyalMailFirstClass',
            'KAC\SiteBundle\Manager\Delivery\Method\HomeDelivery',
            'KAC\SiteBundle\Manager\Delivery\Method\Collection',
        );
    }

    /**
     * @return array
     */
    private static function getCourierClasses()
    {
        return array(
            'KAC\SiteBundle\Manager\Delivery\Courier\Dpd',
            'KAC\SiteBundle\Manager\Delivery\Courier\Ghc',
            'KAC\SiteBundle\Manager\Delivery\Courier\Palletways',
            'KAC\SiteBundle\Manager\Delivery\Courier\RoyalMail',
        );
    }
} 