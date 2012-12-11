<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class WebIlluminationAdminBundleEntityBrandProxy extends \WebIllumination\AdminBundle\Entity\Brand implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function create()
    {
        $this->__load();
        return parent::create();
    }

    public function update()
    {
        $this->__load();
        return parent::update();
    }

    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setStatus($status)
    {
        $this->__load();
        return parent::setStatus($status);
    }

    public function getStatus()
    {
        $this->__load();
        return parent::getStatus();
    }

    public function getStatusColour()
    {
        $this->__load();
        return parent::getStatusColour();
    }

    public function setRequestABrochure($requestABrochure)
    {
        $this->__load();
        return parent::setRequestABrochure($requestABrochure);
    }

    public function getRequestABrochure()
    {
        $this->__load();
        return parent::getRequestABrochure();
    }

    public function setBrochureWebAddress($brochureWebAddress)
    {
        $this->__load();
        return parent::setBrochureWebAddress($brochureWebAddress);
    }

    public function getBrochureWebAddress()
    {
        $this->__load();
        return parent::getBrochureWebAddress();
    }

    public function setRequestASample($requestASample)
    {
        $this->__load();
        return parent::setRequestASample($requestASample);
    }

    public function getRequestASample()
    {
        $this->__load();
        return parent::getRequestASample();
    }

    public function setSampleWebAddress($sampleWebAddress)
    {
        $this->__load();
        return parent::setSampleWebAddress($sampleWebAddress);
    }

    public function getSampleWebAddress()
    {
        $this->__load();
        return parent::getSampleWebAddress();
    }

    public function setHidePrices($hidePrices)
    {
        $this->__load();
        return parent::setHidePrices($hidePrices);
    }

    public function getHidePrices()
    {
        $this->__load();
        return parent::getHidePrices();
    }

    public function setShowPricesOutOfHours($showPricesOutOfHours)
    {
        $this->__load();
        return parent::setShowPricesOutOfHours($showPricesOutOfHours);
    }

    public function getShowPricesOutOfHours()
    {
        $this->__load();
        return parent::getShowPricesOutOfHours();
    }

    public function setCreatedAt($createdAt)
    {
        $this->__load();
        return parent::setCreatedAt($createdAt);
    }

    public function getCreatedAt()
    {
        $this->__load();
        return parent::getCreatedAt();
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->__load();
        return parent::setUpdatedAt($updatedAt);
    }

    public function getUpdatedAt()
    {
        $this->__load();
        return parent::getUpdatedAt();
    }

    public function setMembershipCardDiscountAvailable($membershipCardDiscountAvailable)
    {
        $this->__load();
        return parent::setMembershipCardDiscountAvailable($membershipCardDiscountAvailable);
    }

    public function getMembershipCardDiscountAvailable()
    {
        $this->__load();
        return parent::getMembershipCardDiscountAvailable();
    }

    public function setMaximumMembershipCardDiscount($maximumMembershipCardDiscount)
    {
        $this->__load();
        return parent::setMaximumMembershipCardDiscount($maximumMembershipCardDiscount);
    }

    public function getMaximumMembershipCardDiscount()
    {
        $this->__load();
        return parent::getMaximumMembershipCardDiscount();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'status', 'requestABrochure', 'brochureWebAddress', 'requestASample', 'sampleWebAddress', 'hidePrices', 'showPricesOutOfHours', 'membershipCardDiscountAvailable', 'maximumMembershipCardDiscount', 'createdAt', 'updatedAt');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}