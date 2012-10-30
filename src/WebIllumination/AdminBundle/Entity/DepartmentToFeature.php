<?php
namespace WebIllumination\AdminBundle\Entity;

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
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="active", type="integer", length="1")
     */
    private $active;
    
    /**
     * @ORM\Column(name="department_id", type="integer", length="11")
     */
    private $departmentId;
    
    /**
     * @ORM\Column(name="product_feature_group_id", type="integer", length="11")
     */
    private $productFeatureGroupId;
    
    /**
     * @ORM\Column(name="default_product_feature_id", type="integer", length="11")
     */
    private $defaultProductFeatureId;
        
    /**
     * @ORM\Column(name="display_on_filter", type="integer", length="1")
     */
    private $displayOnFilter;
    
    /**
     * @ORM\Column(name="display_on_listing", type="integer", length="1")
     */
    private $displayOnListing;
    
    /**
     * @ORM\Column(name="display_on_product", type="integer", length="1")
     */
    private $displayOnProduct;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length="11")
     */
    private $displayOrder;
            
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

	/**
	 * @ORM\prePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\preUpdate
	 */
    public function update()
    {
        $this->updatedAt = new \DateTime();
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
}