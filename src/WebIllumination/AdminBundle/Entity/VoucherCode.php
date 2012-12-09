<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="voucher_code")
 * @ORM\HasLifecycleCallbacks()
 */
class VoucherCode
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;
	
	/**
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    
    /**
     * @ORM\Column(name="minimum_order_value", type="decimal", precision=12, scale=4)
     */
    private $minimumOrderValue;
    
    /**
     * @ORM\Column(name="discount", type="decimal", precision=12, scale=4)
     */
    private $discount;
    
    /**
     * @ORM\Column(name="discount_type", type="string", length=1)
     */
    private $discountType;
    
    /**
     * @ORM\Column(name="discount_use", type="string", length=1)
     */
    private $discountUse;
    
    /**
     * @ORM\Column(name="number_of_uses", type="integer", length=11)
     */
    private $numberOfUses;
    
    /**
     * @ORM\Column(name="number_used", type="integer", length=11)
     */
    private $numberUsed;
    
    /**
     * @ORM\Column(name="brands", type="text")
     */
    private $brands;
    
    /**
     * @ORM\Column(name="departments", type="text")
     */
    private $departments;
    
    /**
     * @ORM\Column(name="products", type="text")
     */
    private $products;
    
    /**
     * @ORM\Column(name="orders", type="text")
     */
    private $orders;
    
    /**
     * @ORM\Column(name="creator", type="string", length=255)
     */
    private $creator;
    
    /**
     * @ORM\Column(name="active", type="integer", length=1)
     */
    private $active;
    
    /**
     * @ORM\Column(name="valid_from_date", type="datetime")
     */
    private $validFromDate;                
    
    /**
     * @ORM\Column(name="expiry_date", type="datetime")
     */
    private $expiryDate;
    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

	/**
	 * @ORM\PrePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\PreUpdate
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
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set minimumOrderValue
     *
     * @param decimal $minimumOrderValue
     */
    public function setMinimumOrderValue($minimumOrderValue)
    {
        $this->minimumOrderValue = $minimumOrderValue;
    }

    /**
     * Get minimumOrderValue
     *
     * @return decimal 
     */
    public function getMinimumOrderValue()
    {
        return $this->minimumOrderValue;
    }

    /**
     * Set discount
     *
     * @param decimal $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * Get discount
     *
     * @return decimal 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set discountType
     *
     * @param string $discountType
     */
    public function setDiscountType($discountType)
    {
        $this->discountType = $discountType;
    }

    /**
     * Get discountType
     *
     * @return string 
     */
    public function getDiscountType()
    {
        return $this->discountType;
    }
    
    /**
     * Get discountTypeName
     *
     * @return string 
     */
    public function getDiscountTypeName()
    {
        switch ($this->discountType)
    	{
    		case 'p':
    			return 'Percentage Off';
    		case 'a':
    			return 'Fixed Amount Off';
    		case 'r':
    			return 'Replaces Value';
    		case 'd':
    			return 'Free Delivery';
    		case 'm':
    			return 'Free Membership Card';
    	}
        return 'Unknown';
    }
    
    /**
     * Get discountTypeSymbol
     *
     * @return string 
     */
    public function getDiscountTypeSymbol()
    {
        switch ($this->discountType)
    	{
    		case 'p':
    			return '%';
    		case 'a':
    			return '&pound;';
    		case 'r':
    			return '&pound;';
    		case 'd':
    		case 'm':
    			return '';
    	}
        return '';
    }

    /**
     * Set discountUse
     *
     * @param string $discountUse
     */
    public function setDiscountUse($discountUse)
    {
        $this->discountUse = $discountUse;
    }

    /**
     * Get discountUse
     *
     * @return string 
     */
    public function getDiscountUse()
    {
        return $this->discountUse;
    }
    
    /**
     * Get discountUseName
     *
     * @return string 
     */
    public function getDiscountUseName()
    {
        switch ($this->discountUse)
    	{
    		case 's':
    			return 'Once Only';
    		case 'u':
    			return 'Unlimited Use';
    		case 'f':
    			return 'Fixed Number of Times';
    	}
        return 'Unknown';
    }

    /**
     * Set numberOfUses
     *
     * @param integer $numberOfUses
     */
    public function setNumberOfUses($numberOfUses)
    {
        $this->numberOfUses = $numberOfUses;
    }

    /**
     * Get numberOfUses
     *
     * @return integer 
     */
    public function getNumberOfUses()
    {
        return $this->numberOfUses;
    }

    /**
     * Set numberUsed
     *
     * @param integer $numberUsed
     */
    public function setNumberUsed($numberUsed)
    {
        $this->numberUsed = $numberUsed;
    }

    /**
     * Get numberUsed
     *
     * @return integer 
     */
    public function getNumberUsed()
    {
        return $this->numberUsed;
    }

    /**
     * Set brands
     *
     * @param text $brands
     */
    public function setBrands($brands)
    {
        $this->brands = $brands;
    }

    /**
     * Get brands
     *
     * @return text 
     */
    public function getBrands()
    {
        return $this->brands;
    }

    /**
     * Set departments
     *
     * @param text $departments
     */
    public function setDepartments($departments)
    {
        $this->departments = $departments;
    }

    /**
     * Get departments
     *
     * @return text 
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Set products
     *
     * @param text $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * Get products
     *
     * @return text 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set orders
     *
     * @param text $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    /**
     * Get orders
     *
     * @return text 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set creator
     *
     * @param string $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * Get creator
     *
     * @return string 
     */
    public function getCreator()
    {
        return $this->creator;
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
     * Get activeColour
     *
     * @return string 
     */
    public function getActiveColour()
    {
        switch ($this->active)
    	{
    		case 1:
    			return 'green';
    		default:
    		case 0:
    			return 'red';
    	}
        return 'red';
    }
    
    /**
     * Get activeIcon
     *
     * @return text 
     */
    public function getActiveIcon()
    {
        return 'bundles/webilluminationadmin/images/icons/'.$this->getActiveColour().'-light-icon.png';
    }

    /**
     * Set validFromDate
     *
     * @param datetime $validFromDate
     */
    public function setValidFromDate($validFromDate)
    {
        $this->validFromDate = $validFromDate;
    }

    /**
     * Get validFromDate
     *
     * @return datetime 
     */
    public function getValidFromDate()
    {
        return $this->validFromDate;
    }

    /**
     * Set expiryDate
     *
     * @param datetime $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * Get expiryDate
     *
     * @return datetime 
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
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