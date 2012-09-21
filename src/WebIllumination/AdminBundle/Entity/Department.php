<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="department")
 * @ORM\HasLifecycleCallbacks()
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="parent_id", type="integer", length="11")
     */
    private $parentId;
    
    /**
     * @ORM\Column(name="status", type="string", length="1")
     */
    private $status;
    
    /**
     * @ORM\Column(name="department_path", type="text")
     */
    private $departmentPath;
    
    /**
     * @ORM\Column(name="hide_prices", type="integer", length="1")
     */
    private $hidePrices;
    
    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="integer", length="1")
     */
    private $showPricesOutOfHours;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="integer", length="1")
     */
    private $membershipCardDiscountAvailable;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision="12", scale="4")
     */
    private $maximumMembershipCardDiscount;
    
    /**
     * @ORM\Column(name="delivery_band", type="decimal", precision="12", scale="4")
     */
    private $deliveryBand;
    
    /**
     * @ORM\Column(name="check_delivery_band", type="decimal", precision="12", scale="4")
     */
    private $checkDeliveryBand;
    
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
    
    public function __construct()
    {
        $this->departmentDescriptions = new ArrayCollection();
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
     * Set parentId
     *
     * @param integer $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
    			return 'yellow';
    	}
        return '';
    }

    /**
     * Set departmentPath
     *
     * @param text $departmentPath
     */
    public function setDepartmentPath($departmentPath)
    {
        $this->departmentPath = $departmentPath;
    }

    /**
     * Get departmentPath
     *
     * @return text 
     */
    public function getDepartmentPath()
    {
        return $this->departmentPath;
    }

    /**
     * Set hidePrices
     *
     * @param integer $hidePrices
     */
    public function setHidePrices($hidePrices)
    {
        $this->hidePrices = $hidePrices;
    }

    /**
     * Get hidePrices
     *
     * @return integer 
     */
    public function getHidePrices()
    {
        return $this->hidePrices;
    }

    /**
     * Set showPricesOutOfHours
     *
     * @param integer $showPricesOutOfHours
     */
    public function setShowPricesOutOfHours($showPricesOutOfHours)
    {
        $this->showPricesOutOfHours = $showPricesOutOfHours;
    }

    /**
     * Get showPricesOutOfHours
     *
     * @return integer 
     */
    public function getShowPricesOutOfHours()
    {
        return $this->showPricesOutOfHours;
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
     * Set membershipCardDiscountAvailable
     *
     * @param integer $membershipCardDiscountAvailable
     */
    public function setMembershipCardDiscountAvailable($membershipCardDiscountAvailable)
    {
        $this->membershipCardDiscountAvailable = $membershipCardDiscountAvailable;
    }

    /**
     * Get membershipCardDiscountAvailable
     *
     * @return integer 
     */
    public function getMembershipCardDiscountAvailable()
    {
        return $this->membershipCardDiscountAvailable;
    }

    /**
     * Set maximumMembershipCardDiscount
     *
     * @param decimal $maximumMembershipCardDiscount
     */
    public function setMaximumMembershipCardDiscount($maximumMembershipCardDiscount)
    {
        $this->maximumMembershipCardDiscount = $maximumMembershipCardDiscount;
    }

    /**
     * Get maximumMembershipCardDiscount
     *
     * @return decimal 
     */
    public function getMaximumMembershipCardDiscount()
    {
        return $this->maximumMembershipCardDiscount;
    }

    /**
     * Set deliveryBand
     *
     * @param decimal $deliveryBand
     */
    public function setDeliveryBand($deliveryBand)
    {
        $this->deliveryBand = $deliveryBand;
    }

    /**
     * Get deliveryBand
     *
     * @return decimal 
     */
    public function getDeliveryBand()
    {
        return $this->deliveryBand;
    }

    /**
     * Set checkDeliveryBand
     *
     * @param decimal $checkDeliveryBand
     */
    public function setCheckDeliveryBand($checkDeliveryBand)
    {
        $this->checkDeliveryBand = $checkDeliveryBand;
    }

    /**
     * Get checkDeliveryBand
     *
     * @return decimal 
     */
    public function getCheckDeliveryBand()
    {
        return $this->checkDeliveryBand;
    }
}