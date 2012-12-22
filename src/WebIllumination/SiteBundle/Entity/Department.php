<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="departments")
 * @ORM\HasLifecycleCallbacks()
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Department", mappedBy="parent", cascade={"remove"})
     **/
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Department", inversedBy="children")
     **/
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\BrandToDepartment", mappedBy="department", cascade={"all"})
     **/
    private $brands;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Department\Description", mappedBy="department", cascade={"all"})
     **/
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\DepartmentToFeature", mappedBy="department", cascade={"all"})
     **/
    private $features;
    
    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;
    
    /**
     * @ORM\Column(name="department_path", type="text")
     */
    private $departmentPath;
    
    /**
     * @ORM\Column(name="hide_prices", type="boolean")
     */
    private $hidePrices;
    
    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="boolean")
     */
    private $showPricesOutOfHours;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="boolean")
     */
    private $membershipCardDiscountAvailable;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4)
     */
    private $maximumMembershipCardDiscount;
    
    /**
     * @ORM\Column(name="delivery_band", type="decimal", precision=12, scale=4)
     */
    private $deliveryBand;
    
    /**
     * @ORM\Column(name="inherited_delivery_band", type="decimal", precision=12, scale=4)
     */
    private $inheritedDeliveryBand;
    
    /**
     * @ORM\Column(name="check_delivery_band", type="boolean")
     */
    private $checkDeliveryBand;
    
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
     * Get statusColour
     *
     * @return string 
     */
    public function getStatusColour()
    {
        switch ($this->status)
    	{
    		case 'd':
    			return 'red';
    		case 'a':
    			return 'green';
    		case 'h':
    			return 'orange';
    	}
        return '';
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set status
     *
     * @param string $status
     * @return Department
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set departmentPath
     *
     * @param string $departmentPath
     * @return Department
     */
    public function setDepartmentPath($departmentPath)
    {
        $this->departmentPath = $departmentPath;
    
        return $this;
    }

    /**
     * Get departmentPath
     *
     * @return string 
     */
    public function getDepartmentPath()
    {
        return $this->departmentPath;
    }

    /**
     * Set hidePrices
     *
     * @param boolean $hidePrices
     * @return Department
     */
    public function setHidePrices($hidePrices)
    {
        $this->hidePrices = $hidePrices;
    
        return $this;
    }

    /**
     * Get hidePrices
     *
     * @return boolean 
     */
    public function getHidePrices()
    {
        return $this->hidePrices;
    }

    /**
     * Set showPricesOutOfHours
     *
     * @param boolean $showPricesOutOfHours
     * @return Department
     */
    public function setShowPricesOutOfHours($showPricesOutOfHours)
    {
        $this->showPricesOutOfHours = $showPricesOutOfHours;
    
        return $this;
    }

    /**
     * Get showPricesOutOfHours
     *
     * @return boolean 
     */
    public function getShowPricesOutOfHours()
    {
        return $this->showPricesOutOfHours;
    }

    /**
     * Set membershipCardDiscountAvailable
     *
     * @param boolean $membershipCardDiscountAvailable
     * @return Department
     */
    public function setMembershipCardDiscountAvailable($membershipCardDiscountAvailable)
    {
        $this->membershipCardDiscountAvailable = $membershipCardDiscountAvailable;
    
        return $this;
    }

    /**
     * Get membershipCardDiscountAvailable
     *
     * @return boolean 
     */
    public function getMembershipCardDiscountAvailable()
    {
        return $this->membershipCardDiscountAvailable;
    }

    /**
     * Set maximumMembershipCardDiscount
     *
     * @param float $maximumMembershipCardDiscount
     * @return Department
     */
    public function setMaximumMembershipCardDiscount($maximumMembershipCardDiscount)
    {
        $this->maximumMembershipCardDiscount = $maximumMembershipCardDiscount;
    
        return $this;
    }

    /**
     * Get maximumMembershipCardDiscount
     *
     * @return float 
     */
    public function getMaximumMembershipCardDiscount()
    {
        return $this->maximumMembershipCardDiscount;
    }

    /**
     * Set deliveryBand
     *
     * @param float $deliveryBand
     * @return Department
     */
    public function setDeliveryBand($deliveryBand)
    {
        $this->deliveryBand = $deliveryBand;
    
        return $this;
    }

    /**
     * Get deliveryBand
     *
     * @return float 
     */
    public function getDeliveryBand()
    {
        return $this->deliveryBand;
    }

    /**
     * Set inheritedDeliveryBand
     *
     * @param float $inheritedDeliveryBand
     * @return Department
     */
    public function setInheritedDeliveryBand($inheritedDeliveryBand)
    {
        $this->inheritedDeliveryBand = $inheritedDeliveryBand;
    
        return $this;
    }

    /**
     * Get inheritedDeliveryBand
     *
     * @return float 
     */
    public function getInheritedDeliveryBand()
    {
        return $this->inheritedDeliveryBand;
    }

    /**
     * Set checkDeliveryBand
     *
     * @param boolean $checkDeliveryBand
     * @return Department
     */
    public function setCheckDeliveryBand($checkDeliveryBand)
    {
        $this->checkDeliveryBand = $checkDeliveryBand;
    
        return $this;
    }

    /**
     * Get checkDeliveryBand
     *
     * @return boolean 
     */
    public function getCheckDeliveryBand()
    {
        return $this->checkDeliveryBand;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Department
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
     * @return Department
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
     * @return Department
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
     * Add children
     *
     * @param \WebIllumination\SiteBundle\Entity\Department $children
     * @return Department
     */
    public function addChildren(\WebIllumination\SiteBundle\Entity\Department $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \WebIllumination\SiteBundle\Entity\Department $children
     */
    public function removeChildren(\WebIllumination\SiteBundle\Entity\Department $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \WebIllumination\SiteBundle\Entity\Department $parent
     * @return Department
     */
    public function setParent(\WebIllumination\SiteBundle\Entity\Department $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \WebIllumination\SiteBundle\Entity\Department 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set description
     *
     * @param \WebIllumination\SiteBundle\Entity\Department\Description $description
     * @return Department
     */
    public function addDescription(\WebIllumination\SiteBundle\Entity\Department\Description $description)
    {
        $this->descriptions = $description;
    
        return $this;
    }

    /**
     * Add features
     *
     * @param \WebIllumination\SiteBundle\Entity\DepartmentToFeature $features
     * @return Department
     */
    public function addFeature(\WebIllumination\SiteBundle\Entity\DepartmentToFeature $features)
    {
        $this->features[] = $features;
    
        return $this;
    }

    /**
     * Remove features
     *
     * @param \WebIllumination\SiteBundle\Entity\DepartmentToFeature $features
     */
    public function removeFeature(\WebIllumination\SiteBundle\Entity\DepartmentToFeature $features)
    {
        $this->features->removeElement($features);
    }

    /**
     * Get features
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Set brands
     *
     * @param \WebIllumination\SiteBundle\Entity\BrandToDepartment $brands
     * @return Department
     */
    public function setBrands(\WebIllumination\SiteBundle\Entity\BrandToDepartment $brands = null)
    {
        $this->brands = $brands;
    
        return $this;
    }

    /**
     * Get brands
     *
     * @return \WebIllumination\SiteBundle\Entity\BrandToDepartment 
     */
    public function getBrands()
    {
        return $this->brands;
    }

    /**
     * Remove descriptions
     *
     * @param \WebIllumination\SiteBundle\Entity\Department\Description $descriptions
     */
    public function removeDescription(\WebIllumination\SiteBundle\Entity\Department\Description $descriptions)
    {
        $this->descriptions->removeElement($descriptions);
    }

    /**
     * Get descriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * Add brands
     *
     * @param \WebIllumination\SiteBundle\Entity\BrandToDepartment $brands
     * @return Department
     */
    public function addBrand(\WebIllumination\SiteBundle\Entity\BrandToDepartment $brands)
    {
        $this->brands[] = $brands;
    
        return $this;
    }

    /**
     * Remove brands
     *
     * @param \WebIllumination\SiteBundle\Entity\BrandToDepartment $brands
     */
    public function removeBrand(\WebIllumination\SiteBundle\Entity\BrandToDepartment $brands)
    {
        $this->brands->removeElement($brands);
    }
}