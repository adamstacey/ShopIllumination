<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="department_to_feature")
 * @ORM\HasLifecycleCallbacks()
 */
class DepartmentToFeature
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Department", inversedBy="features")
     **/
    private $department;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product\FeatureGroup")
     * @ORM\JoinColumn(name="feature_group_id", referencedColumnName="id")
     **/
    private $featureGroup;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product\Feature")
     * @ORM\JoinColumn(name="feature_id", referencedColumnName="id")
     **/
    private $feature;
        
    /**
     * @ORM\Column(name="display_on_filter", type="boolean")
     */
    private $displayOnFilter;
    
    /**
     * @ORM\Column(name="display_on_listing", type="boolean")
     */
    private $displayOnListing;
    
    /**
     * @ORM\Column(name="display_on_product", type="boolean")
     */
    private $displayOnProduct;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
     */
    private $displayOrder;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    public function __toString()
    {
        if ($this->getFeatureGroup())
        {
            return $this->getFeatureGroup()->__toString();
        } else {
            return " -- ";
        }
    }

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
     * @return DepartmentToFeature
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
     * Set displayOnFilter
     *
     * @param boolean $displayOnFilter
     * @return DepartmentToFeature
     */
    public function setDisplayOnFilter($displayOnFilter)
    {
        $this->displayOnFilter = $displayOnFilter;
    
        return $this;
    }

    /**
     * Get displayOnFilter
     *
     * @return boolean 
     */
    public function getDisplayOnFilter()
    {
        return $this->displayOnFilter;
    }

    /**
     * Set displayOnListing
     *
     * @param boolean $displayOnListing
     * @return DepartmentToFeature
     */
    public function setDisplayOnListing($displayOnListing)
    {
        $this->displayOnListing = $displayOnListing;
    
        return $this;
    }

    /**
     * Get displayOnListing
     *
     * @return boolean 
     */
    public function getDisplayOnListing()
    {
        return $this->displayOnListing;
    }

    /**
     * Set displayOnProduct
     *
     * @param boolean $displayOnProduct
     * @return DepartmentToFeature
     */
    public function setDisplayOnProduct($displayOnProduct)
    {
        $this->displayOnProduct = $displayOnProduct;
    
        return $this;
    }

    /**
     * Get displayOnProduct
     *
     * @return boolean 
     */
    public function getDisplayOnProduct()
    {
        return $this->displayOnProduct;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return DepartmentToFeature
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
     * @return DepartmentToFeature
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
     * @return DepartmentToFeature
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
     * Set department
     *
     * @param \KAC\SiteBundle\Entity\Department $department
     * @return DepartmentToFeature
     */
    public function setDepartment(\KAC\SiteBundle\Entity\Department $department = null)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return \KAC\SiteBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set featureGroup
     *
     * @param \KAC\SiteBundle\Entity\Product\FeatureGroup $featureGroup
     * @return DepartmentToFeature
     */
    public function setFeatureGroup(\KAC\SiteBundle\Entity\Product\FeatureGroup $featureGroup = null)
    {
        $this->featureGroup = $featureGroup;
    
        return $this;
    }

    /**
     * Get featureGroup
     *
     * @return \KAC\SiteBundle\Entity\Product\FeatureGroup
     */
    public function getFeatureGroup()
    {
        return $this->featureGroup;
    }

    /**
     * Set feature
     *
     * @param \KAC\SiteBundle\Entity\Product\Feature $feature
     * @return DepartmentToFeature
     */
    public function setFeature(\KAC\SiteBundle\Entity\Product\Feature $feature = null)
    {
        $this->feature = $feature;
    
        return $this;
    }

    /**
     * Get feature
     *
     * @return \KAC\SiteBundle\Entity\Product\Feature
     */
    public function getFeature()
    {
        return $this->feature;
    }
}