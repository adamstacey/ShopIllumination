<?php
namespace KAC\SiteBundle\Model;

use JMS\Serializer\Annotation as Serializer;
use KAC\SiteBundle\Manager\Delivery\DeliveryMethodFactory;
use Symfony\Component\Validator\Constraints as Assert;

class BasketDeliveryInfo
{
    /**
     * @var Basket
     * @Serializer\Type("KAC\SiteBundle\Model\Basket")
     */
    private $basket = null;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $methods = array();
    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $estimatedDeliveryDays = array();
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $countryCode = 'GB';
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $postZipCode = '';
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $weighting = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $weight = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $band = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $zone = 0;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $method = '';
    /**
     * @var int
     * @Serializer\Type("double")
     */
    private $price = 0;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $notes = '';

    /**
     * @Serializer\PreSerialize
     */
    public function preSerialize()
    {
        $methods = $this->methods;
        $this->methods = array();

        foreach($methods as $method)
        {
            $this->methods[] = $method->getName();
        }
        if($this->method && is_object($this->method))
        {
            $this->method = $this->method->getName();
        }
    }

    /**
     * @Serializer\PostDeserialize
     */
    public function postDeserialize()
    {
        $methods = $this->methods;
        $this->methods = array();

        foreach($methods as $methodName)
        {
            if(($method = DeliveryMethodFactory::getMethod($methodName)) !== null)
            {
                $this->methods[] = $method;
            }
        }
        if(($method = DeliveryMethodFactory::getMethod($this->method)) !== null)
        {
            $this->method = $method;
        }
    }

    /**
     * @param null $basket
     */
    public function setBasket($basket)
    {
        $this->basket = $basket;
    }

    /**
     * @return null
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @param int $band
     */
    public function setBand($band)
    {
        $this->band = $band;
    }

    /**
     * @return int
     */
    public function getBand()
    {
        return $this->band;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param array $deliveryOptions
     */
    public function setMethods($deliveryOptions)
    {
        $this->methods = $deliveryOptions;
    }

    /**
     * @return array
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * @param array $estimatedDeliveryDays
     */
    public function setEstimatedDeliveryDays($estimatedDeliveryDays)
    {
        $this->estimatedDeliveryDays = $estimatedDeliveryDays;
    }

    /**
     * @return array
     */
    public function getEstimatedDeliveryDays()
    {
        return $this->estimatedDeliveryDays;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $postZipCode
     */
    public function setPostZipCode($postZipCode)
    {
        $this->postZipCode = $postZipCode;
    }

    /**
     * @return string
     */
    public function getPostZipCode()
    {
        return $this->postZipCode;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $service
     */
    public function setMethod($service)
    {
        $this->method = $service;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weighting
     */
    public function setWeighting($weighting)
    {
        $this->weighting = $weighting;
    }

    /**
     * @return int
     */
    public function getWeighting()
    {
        return $this->weighting;
    }

    /**
     * @param int $zone
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    /**
     * @return int
     */
    public function getZone()
    {
        return $this->zone;
    }
}