<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class WebIlluminationAdminBundleEntityContactWebAddressProxy extends \WebIllumination\AdminBundle\Entity\ContactWebAddress implements \Doctrine\ORM\Proxy\Proxy
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

    public function setContactWebAddressTypeId($contactWebAddressTypeId)
    {
        $this->__load();
        return parent::setContactWebAddressTypeId($contactWebAddressTypeId);
    }

    public function getContactWebAddressTypeId()
    {
        $this->__load();
        return parent::getContactWebAddressTypeId();
    }

    public function setContactId($contactId)
    {
        $this->__load();
        return parent::setContactId($contactId);
    }

    public function getContactId()
    {
        $this->__load();
        return parent::getContactId();
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

    public function setDisplayName($displayName)
    {
        $this->__load();
        return parent::setDisplayName($displayName);
    }

    public function getDisplayName()
    {
        $this->__load();
        return parent::getDisplayName();
    }

    public function setUrl($url)
    {
        $this->__load();
        return parent::setUrl($url);
    }

    public function getUrl()
    {
        $this->__load();
        return parent::getUrl();
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
        return array('__isInitialized__', 'id', 'contactWebAddressTypeId', 'contactId', 'displayOrder', 'displayName', 'url', 'createdAt', 'updatedAt');
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