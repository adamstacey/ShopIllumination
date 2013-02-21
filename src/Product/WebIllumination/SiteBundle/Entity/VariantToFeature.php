<?php

namespace WebIllumination\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VariantToFeature
 */
class VariantToFeature
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
     * @var \WebIllumination\SiteBundle\Entity\Product\FeatureGroup
     */
    private $featureGroup;

    /**
     * @var \WebIllumination\SiteBundle\Entity\Product\Feature
     */
    private $feature;


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
     * @return VariantToFeature
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
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return VariantToFeature
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
     * @return VariantToFeature
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
     * @return VariantToFeature
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
     * @return VariantToFeature
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
     * Set featureGroup
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\FeatureGroup $featureGroup
     * @return VariantToFeature
     */
    public function setFeatureGroup(\WebIllumination\SiteBundle\Entity\Product\FeatureGroup $featureGroup = null)
    {
        $this->featureGroup = $featureGroup;
    
        return $this;
    }

    /**
     * Get featureGroup
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\FeatureGroup 
     */
    public function getFeatureGroup()
    {
        return $this->featureGroup;
    }

    /**
     * Set feature
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Feature $feature
     * @return VariantToFeature
     */
    public function setFeature(\WebIllumination\SiteBundle\Entity\Product\Feature $feature = null)
    {
        $this->feature = $feature;
    
        return $this;
    }

    /**
     * Get feature
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Feature 
     */
    public function getFeature()
    {
        return $this->feature;
    }
}