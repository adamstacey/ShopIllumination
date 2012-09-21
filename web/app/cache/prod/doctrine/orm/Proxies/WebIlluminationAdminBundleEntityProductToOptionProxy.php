<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class WebIlluminationAdminBundleEntityProductToOptionProxy extends \WebIllumination\AdminBundle\Entity\ProductToOption implements \Doctrine\ORM\Proxy\Proxy
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

    public function setActive($active)
    {
        $this->__load();
        return parent::setActive($active);
    }

    public function getActive()
    {
        $this->__load();
        return parent::getActive();
    }

    public function setProductId($productId)
    {
        $this->__load();
        return parent::setProductId($productId);
    }

    public function getProductId()
    {
        $this->__load();
        return parent::getProductId();
    }

    public function setProductOptionGroupId($productOptionGroupId)
    {
        $this->__load();
        return parent::setProductOptionGroupId($productOptionGroupId);
    }

    public function getProductOptionGroupId()
    {
        $this->__load();
        return parent::getProductOptionGroupId();
    }

    public function setProductOptionId($productOptionId)
    {
        $this->__load();
        return parent::setProductOptionId($productOptionId);
    }

    public function getProductOptionId()
    {
        $this->__load();
        return parent::getProductOptionId();
    }

    public function setPrice($price)
    {
        $this->__load();
        return parent::setPrice($price);
    }

    public function getPrice()
    {
        $this->__load();
        return parent::getPrice();
    }

    public function setPriceType($priceType)
    {
        $this->__load();
        return parent::setPriceType($priceType);
    }

    public function getPriceType()
    {
        $this->__load();
        return parent::getPriceType();
    }

    public function setPriceUse($priceUse)
    {
        $this->__load();
        return parent::setPriceUse($priceUse);
    }

    public function getPriceUse()
    {
        $this->__load();
        return parent::getPriceUse();
    }

    public function setDisplayOrder($displayOrder)
    {
        $this->__load();
        return parent::setDisplayOrder($displayOrder);
    }

    public function getDisplayOrder()
    {
        $this->__load();
        return parent::getDisplayOrder();
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


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'active', 'productId', 'productOptionGroupId', 'productOptionId', 'price', 'priceType', 'priceUse', 'displayOrder', 'createdAt', 'updatedAt');
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