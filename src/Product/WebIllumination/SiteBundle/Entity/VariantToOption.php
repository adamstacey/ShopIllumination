<?php

namespace WebIllumination\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VariantToOption
 */
class VariantToOption
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $priceType;

    /**
     * @var string
     */
    private $priceUse;

    /**
     * @var integer
     */
    private $displayOrder;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \WebIllumination\SiteBundle\Entity\Product\Variant
     */
    private $variant;

    /**
     * @var \WebIllumination\SiteBundle\Entity\Product\OptionGroup
     */
    private $optionGroup;

    /**
     * @var \WebIllumination\SiteBundle\Entity\Product\Option
     */
    private $option;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return VariantToOption
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return VariantToOption
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set priceType
     *
     * @param string $priceType
     * @return VariantToOption
     */
    public function setPriceType($priceType)
    {
        $this->priceType = $priceType;
    
        return $this;
    }

    /**
     * Get priceType
     *
     * @return string 
     */
    public function getPriceType()
    {
        return $this->priceType;
    }

    /**
     * Set priceUse
     *
     * @param string $priceUse
     * @return VariantToOption
     */
    public function setPriceUse($priceUse)
    {
        $this->priceUse = $priceUse;
    
        return $this;
    }

    /**
     * Get priceUse
     *
     * @return string 
     */
    public function getPriceUse()
    {
        return $this->priceUse;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return VariantToOption
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
    
        return $this;
    }

    /**
     * Get displayOrder
     *
     * @return integer 
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return VariantToOption
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return VariantToOption
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set variant
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Variant $variant
     * @return VariantToOption
     */
    public function setVariant(\WebIllumination\SiteBundle\Entity\Product\Variant $variant = null)
    {
        $this->variant = $variant;
    
        return $this;
    }

    /**
     * Get variant
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Variant 
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * Set optionGroup
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\OptionGroup $optionGroup
     * @return VariantToOption
     */
    public function setOptionGroup(\WebIllumination\SiteBundle\Entity\Product\OptionGroup $optionGroup = null)
    {
        $this->optionGroup = $optionGroup;
    
        return $this;
    }

    /**
     * Get optionGroup
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\OptionGroup 
     */
    public function getOptionGroup()
    {
        return $this->optionGroup;
    }

    /**
     * Set option
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Option $option
     * @return VariantToOption
     */
    public function setOption(\WebIllumination\SiteBundle\Entity\Product\Option $option = null)
    {
        $this->option = $option;
    
        return $this;
    }

    /**
     * Get option
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Option 
     */
    public function getOption()
    {
        return $this->option;
    }
}