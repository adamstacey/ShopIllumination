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
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Feature")
     * @ORM\JoinColumn(name="product_feature_id", referencedColumnName="id")
     **/
    private $productFeature;
        
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
     * @param integer $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set departmentId
     *
     * @param integer $departmentId
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    /**
     * Get departmentId
     *
     * @return integer 
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * Set productFeatureGroupId
     *
     * @param integer $productFeatureGroupId
     */
    public function setProductFeatureGroupId($productFeatureGroupId)
    {
        $this->productFeatureGroupId = $productFeatureGroupId;
    }

    /**
     * Get productFeatureGroupId
     *
     * @return integer 
     */
    public function getProductFeatureGroupId()
    {
        return $this->productFeatureGroupId;
    }

    /**
     * Set defaultProductFeatureId
     *
     * @param integer $defaultProductFeatureId
     */
    public function setDefaultProductFeatureId($defaultProductFeatureId)
    {
        $this->defaultProductFeatureId = $defaultProductFeatureId;
    }

    /**
     * Get defaultProductFeatureId
     *
     * @return integer 
     */
    public function getDefaultProductFeatureId()
    {
        return $this->defaultProductFeatureId;
    }

    /**
     * Set displayOnFilter
     *
     * @param integer $displayOnFilter
     */
    public function setDisplayOnFilter($displayOnFilter)
    {
        $this->displayOnFilter = $displayOnFilter;
    }

    /**
     * Get displayOnFilter
     *
     * @return integer 
     */
    public function getDisplayOnFilter()
    {
        return $this->displayOnFilter;
    }

    /**
     * Set displayOnListing
     *
     * @param integer $displayOnListing
     */
    public function setDisplayOnListing($displayOnListing)
    {
        $this->displayOnListing = $displayOnListing;
    }

    /**
     * Get displayOnListing
     *
     * @return integer 
     */
    public function getDisplayOnListing()
    {
        return $this->displayOnListing;
    }

    /**
     * Set displayOnProduct
     *
     * @param integer $displayOnProduct
     */
    public function setDisplayOnProduct($displayOnProduct)
    {
        $this->displayOnProduct = $displayOnProduct;
    }

    /**
     * Get displayOnProduct
     *
     * @return integer 
     */
    public function getDisplayOnProduct()
    {
        return $this->displayOnProduct;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
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
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
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
     * @param \WebIllumination\SiteBundle\Entity\Product\Feature $productFeature
     * @return DepartmentToFeature
     */
    public function setProductFeature(\WebIllumination\SiteBundle\Entity\Product\Feature $productFeature = null)
    {
        $this->productFeature = $productFeature;
    
        return $this;
    }

    /**
     * Get productFeature
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Feature 
     */
    public function getProductFeature()
    {
        return $this->productFeature;
    }
}