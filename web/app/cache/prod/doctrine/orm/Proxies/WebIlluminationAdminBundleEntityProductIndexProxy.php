<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class WebIlluminationAdminBundleEntityProductIndexProxy extends \WebIllumination\AdminBundle\Entity\ProductIndex implements \Doctrine\ORM\Proxy\Proxy
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

    public function setSpecialOffer($specialOffer)
    {
        $this->__load();
        return parent::setSpecialOffer($specialOffer);
    }

    public function getSpecialOffer()
    {
        $this->__load();
        return parent::getSpecialOffer();
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

    public function setWeight($weight)
    {
        $this->__load();
        return parent::setWeight($weight);
    }

    public function getWeight()
    {
        $this->__load();
        return parent::getWeight();
    }

    public function setDeliveryCost($deliveryCost)
    {
        $this->__load();
        return parent::setDeliveryCost($deliveryCost);
    }

    public function getDeliveryCost()
    {
        $this->__load();
        return parent::getDeliveryCost();
    }

    public function setBrandId($brandId)
    {
        $this->__load();
        return parent::setBrandId($brandId);
    }

    public function getBrandId()
    {
        $this->__load();
        return parent::getBrandId();
    }

    public function setBrand($brand)
    {
        $this->__load();
        return parent::setBrand($brand);
    }

    public function getBrand()
    {
        $this->__load();
        return parent::getBrand();
    }

    public function setDepartmentIds($departmentIds)
    {
        $this->__load();
        return parent::setDepartmentIds($departmentIds);
    }

    public function getDepartmentIds()
    {
        $this->__load();
        return parent::getDepartmentIds();
    }

    public function setDepartments($departments)
    {
        $this->__load();
        return parent::setDepartments($departments);
    }

    public function getDepartments()
    {
        $this->__load();
        return parent::getDepartments();
    }

    public function setDepartmentPaths($departmentPaths)
    {
        $this->__load();
        return parent::setDepartmentPaths($departmentPaths);
    }

    public function getDepartmentPaths()
    {
        $this->__load();
        return parent::getDepartmentPaths();
    }

    public function getFirstDepartmentPath()
    {
        $this->__load();
        return parent::getFirstDepartmentPath();
    }

    public function setGoogleDepartment($googleDepartment)
    {
        $this->__load();
        return parent::setGoogleDepartment($googleDepartment);
    }

    public function getGoogleDepartment()
    {
        $this->__load();
        return parent::getGoogleDepartment();
    }

    public function setEbayDepartment($ebayDepartment)
    {
        $this->__load();
        return parent::setEbayDepartment($ebayDepartment);
    }

    public function getEbayDepartment()
    {
        $this->__load();
        return parent::getEbayDepartment();
    }

    public function setAmazonDepartment($amazonDepartment)
    {
        $this->__load();
        return parent::setAmazonDepartment($amazonDepartment);
    }

    public function getAmazonDepartment()
    {
        $this->__load();
        return parent::getAmazonDepartment();
    }

    public function setProductOptions($productOptions)
    {
        $this->__load();
        return parent::setProductOptions($productOptions);
    }

    public function getProductOptions()
    {
        $this->__load();
        return parent::getProductOptions();
    }

    public function setProductFeatures($productFeatures)
    {
        $this->__load();
        return parent::setProductFeatures($productFeatures);
    }

    public function getProductFeatures()
    {
        $this->__load();
        return parent::getProductFeatures();
    }

    public function setThumbnailPath($thumbnailPath)
    {
        $this->__load();
        return parent::setThumbnailPath($thumbnailPath);
    }

    public function getThumbnailPath()
    {
        $this->__load();
        return parent::getThumbnailPath();
    }

    public function setLargePath($largePath)
    {
        $this->__load();
        return parent::setLargePath($largePath);
    }

    public function getLargePath()
    {
        $this->__load();
        return parent::getLargePath();
    }

    public function setProduct($product)
    {
        $this->__load();
        return parent::setProduct($product);
    }

    public function getProduct()
    {
        $this->__load();
        return parent::getProduct();
    }

    public function setHeader($header)
    {
        $this->__load();
        return parent::setHeader($header);
    }

    public function getHeader()
    {
        $this->__load();
        return parent::getHeader();
    }

    public function setProductCode($productCode)
    {
        $this->__load();
        return parent::setProductCode($productCode);
    }

    public function getProductCode()
    {
        $this->__load();
        return parent::getProductCode();
    }

    public function setAlternativeProductCodes($alternativeProductCodes)
    {
        $this->__load();
        return parent::setAlternativeProductCodes($alternativeProductCodes);
    }

    public function getAlternativeProductCodes()
    {
        $this->__load();
        return parent::getAlternativeProductCodes();
    }

    public function setShortDescription($shortDescription)
    {
        $this->__load();
        return parent::setShortDescription($shortDescription);
    }

    public function getShortDescription()
    {
        $this->__load();
        return parent::getShortDescription();
    }

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setSearchWords($searchWords)
    {
        $this->__load();
        return parent::setSearchWords($searchWords);
    }

    public function getSearchWords()
    {
        $this->__load();
        return parent::getSearchWords();
    }

    public function setCostPrice($costPrice)
    {
        $this->__load();
        return parent::setCostPrice($costPrice);
    }

    public function getCostPrice()
    {
        $this->__load();
        return parent::getCostPrice();
    }

    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        $this->__load();
        return parent::setRecommendedRetailPrice($recommendedRetailPrice);
    }

    public function getRecommendedRetailPrice()
    {
        $this->__load();
        return parent::getRecommendedRetailPrice();
    }

    public function setListPrice($listPrice)
    {
        $this->__load();
        return parent::setListPrice($listPrice);
    }

    public function getListPrice()
    {
        $this->__load();
        return parent::getListPrice();
    }

    public function setDiscount($discount)
    {
        $this->__load();
        return parent::setDiscount($discount);
    }

    public function getDiscount()
    {
        $this->__load();
        return parent::getDiscount();
    }

    public function setSavings($savings)
    {
        $this->__load();
        return parent::setSavings($savings);
    }

    public function getSavings()
    {
        $this->__load();
        return parent::getSavings();
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

    public function setCurrencyCode($currencyCode)
    {
        $this->__load();
        return parent::setCurrencyCode($currencyCode);
    }

    public function getCurrencyCode()
    {
        $this->__load();
        return parent::getCurrencyCode();
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

    public function setOriginalPath($originalPath)
    {
        $this->__load();
        return parent::setOriginalPath($originalPath);
    }

    public function getOriginalPath()
    {
        $this->__load();
        return parent::getOriginalPath();
    }

    public function setMediumPath($mediumPath)
    {
        $this->__load();
        return parent::setMediumPath($mediumPath);
    }

    public function getMediumPath()
    {
        $this->__load();
        return parent::getMediumPath();
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

    public function setAvailableForPurchase($availableForPurchase)
    {
        $this->__load();
        return parent::setAvailableForPurchase($availableForPurchase);
    }

    public function getAvailableForPurchase()
    {
        $this->__load();
        return parent::getAvailableForPurchase();
    }

    public function setRecommended($recommended)
    {
        $this->__load();
        return parent::setRecommended($recommended);
    }

    public function getRecommended()
    {
        $this->__load();
        return parent::getRecommended();
    }

    public function setAccessory($accessory)
    {
        $this->__load();
        return parent::setAccessory($accessory);
    }

    public function getAccessory()
    {
        $this->__load();
        return parent::getAccessory();
    }

    public function setNew($new)
    {
        $this->__load();
        return parent::setNew($new);
    }

    public function getNew()
    {
        $this->__load();
        return parent::getNew();
    }

    public function setHidePrice($hidePrice)
    {
        $this->__load();
        return parent::setHidePrice($hidePrice);
    }

    public function getHidePrice()
    {
        $this->__load();
        return parent::getHidePrice();
    }

    public function setShowPriceOutOfHours($showPriceOutOfHours)
    {
        $this->__load();
        return parent::setShowPriceOutOfHours($showPriceOutOfHours);
    }

    public function getShowPriceOutOfHours()
    {
        $this->__load();
        return parent::getShowPriceOutOfHours();
    }

    public function setDeliveryBand($deliveryBand)
    {
        $this->__load();
        return parent::setDeliveryBand($deliveryBand);
    }

    public function getDeliveryBand()
    {
        $this->__load();
        return parent::getDeliveryBand();
    }

    public function setMembershipCardPrice($membershipCardPrice)
    {
        $this->__load();
        return parent::setMembershipCardPrice($membershipCardPrice);
    }

    public function getMembershipCardPrice()
    {
        $this->__load();
        return parent::getMembershipCardPrice();
    }

    public function setChecked($checked)
    {
        $this->__load();
        return parent::setChecked($checked);
    }

    public function getChecked()
    {
        $this->__load();
        return parent::getChecked();
    }

    public function setPrefix($prefix)
    {
        $this->__load();
        return parent::setPrefix($prefix);
    }

    public function getPrefix()
    {
        $this->__load();
        return parent::getPrefix();
    }

    public function setTagline($tagline)
    {
        $this->__load();
        return parent::setTagline($tagline);
    }

    public function getTagline()
    {
        $this->__load();
        return parent::getTagline();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'productId', 'status', 'checked', 'availableForPurchase', 'product', 'prefix', 'tagline', 'header', 'productCode', 'alternativeProductCodes', 'shortDescription', 'description', 'searchWords', 'specialOffer', 'recommended', 'accessory', 'new', 'hidePrice', 'showPriceOutOfHours', 'membershipCardDiscountAvailable', 'maximumMembershipCardDiscount', 'deliveryBand', 'deliveryCost', 'weight', 'brandId', 'brand', 'departmentIds', 'departments', 'departmentPaths', 'googleDepartment', 'ebayDepartment', 'amazonDepartment', 'productOptions', 'productFeatures', 'originalPath', 'thumbnailPath', 'mediumPath', 'largePath', 'costPrice', 'recommendedRetailPrice', 'listPrice', 'membershipCardPrice', 'discount', 'savings', 'currencyCode', 'url', 'locale', 'createdAt', 'updatedAt');
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