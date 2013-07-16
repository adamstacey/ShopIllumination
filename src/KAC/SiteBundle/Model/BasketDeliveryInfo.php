<?php
namespace KAC\SiteBundle\Model;

use JMS\Serializer\Annotation as Serializer;
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
    private $deliveryOptions = array();
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
    private $postZipCode = 'NG162UZ';
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
    private $service = '';
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
    public function setDeliveryOptions($deliveryOptions)
    {
        $this->deliveryOptions = $deliveryOptions;
    }

    /**
     * @return array
     */
    public function getDeliveryOptions()
    {
        return $this->deliveryOptions;
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
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
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