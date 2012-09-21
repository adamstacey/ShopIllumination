<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class WebIlluminationAdminBundleEntityProductFeatureGroupProxy extends \WebIllumination\AdminBundle\Entity\ProductFeatureGroup implements \Doctrine\ORM\Proxy\Proxy
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

    public function setProductFeatureGroup($productFeatureGroup)
    {
        $this->__load();
        return parent::setProductFeatureGroup($productFeatureGroup);
    }

    public function getProductFeatureGroup()
    {
        $this->__load();
        return parent::getProductFeatureGroup();
    }

    public function setLocale($locale)
    {
        $this->__load();
        return parent::setLocale($locale);
    }

    public function getLocale()
    {
        $this->__load();
        return parent::getLocale();
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

    public function setFilter($filter)
    {
        $this->__load();
        return parent::setFilter($filter);
    }

    public function getFilter()
    {
        $this->__load();
        return parent::getFilter();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'active', 'filter', 'productFeatureGroup', 'locale', 'createdAt', 'updatedAt');
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