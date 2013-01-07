<?php
namespace WebIllumination\SiteBundle\Entity;

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
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Department", inversedBy="features")
     **/
    private $department;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\FeatureGroup")
     * @ORM\JoinColumn(name="product_feature_group_id", referencedColumnName="id")
     **/
    private $productFeature;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Feature")
     * @ORM\JoinColumn(name="product_feature_id", referencedColumnName="id")
     **/
    private $defaultFeature;
        
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
        if($this->getProductFeature())
        {
            return $this->getProductFeature()->__toString();
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
     * @param \WebIllumination\SiteBundle\Entity\Department $department
     * @return DepartmentToFeature
     */
    public function setDepartment(\WebIllumination\SiteBundle\Entity\Department $department = null)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return \WebIllumination\SiteBundle\Entity\Department 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set productFeature
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\FeatureGroup $productFeature
     * @return DepartmentToFeature
     */
    public function setProductFeature(\WebIllumination\SiteBundle\Entity\Product\FeatureGroup $productFeature = null)
    {
        $this->productFeature = $productFeature;
    
        return $this;
    }

    /**
     * Get productFeature
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\FeatureGroup 
     */
    public function getProductFeature()
    {
        return $this->productFeature;
    }

    /**
     * Set defaultFeature
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Feature $defaultFeature
     * @return DepartmentToFeature
     */
    public function setDefaultFeature(\WebIllumination\SiteBundle\Entity\Product\Feature $defaultFeature = null)
    {
        $this->defaultFeature = $defaultFeature;
    
        return $this;
    }

    /**
     * Get defaultFeature
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Feature 
     */
    public function getDefaultFeature()
    {
        return $this->defaultFeature;
    }
}