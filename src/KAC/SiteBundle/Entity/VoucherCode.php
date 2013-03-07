<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="voucher_codes")
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
     * @ORM\Column(name="active", type="boolean")
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
        return 'bundles/kacadmin/images/icons/'.$this->getActiveColour().'-light-icon.png';
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
     * @return VoucherCode
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
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
     * @return VoucherCode
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
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
     * @param float $minimumOrderValue
     * @return VoucherCode
     */
    public function setMinimumOrderValue($minimumOrderValue)
    {
        $this->minimumOrderValue = $minimumOrderValue;
    
        return $this;
    }

    /**
     * Get minimumOrderValue
     *
     * @return float 
     */
    public function getMinimumOrderValue()
    {
        return $this->minimumOrderValue;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return VoucherCode
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set discountType
     *
     * @param string $discountType
     * @return VoucherCode
     */
    public function setDiscountType($discountType)
    {
        $this->discountType = $discountType;
    
        return $this;
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
     * Set discountUse
     *
     * @param string $discountUse
     * @return VoucherCode
     */
    public function setDiscountUse($discountUse)
    {
        $this->discountUse = $discountUse;
    
        return $this;
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
     * Set numberOfUses
     *
     * @param integer $numberOfUses
     * @return VoucherCode
     */
    public function setNumberOfUses($numberOfUses)
    {
        $this->numberOfUses = $numberOfUses;
    
        return $this;
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
     * @return VoucherCode
     */
    public function setNumberUsed($numberUsed)
    {
        $this->numberUsed = $numberUsed;
    
        return $this;
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
     * @param string $brands
     * @return VoucherCode
     */
    public function setBrands($brands)
    {
        $this->brands = $brands;
    
        return $this;
    }

    /**
     * Get brands
     *
     * @return string 
     */
    public function getBrands()
    {
        return $this->brands;
    }

    /**
     * Set departments
     *
     * @param string $departments
     * @return VoucherCode
     */
    public function setDepartments($departments)
    {
        $this->departments = $departments;
    
        return $this;
    }

    /**
     * Get departments
     *
     * @return string 
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Set products
     *
     * @param string $products
     * @return VoucherCode
     */
    public function setProducts($products)
    {
        $this->products = $products;
    
        return $this;
    }

    /**
     * Get products
     *
     * @return string 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set orders
     *
     * @param string $orders
     * @return VoucherCode
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    
        return $this;
    }

    /**
     * Get orders
     *
     * @return string 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set creator
     *
     * @param string $creator
     * @return VoucherCode
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    
        return $this;
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
     * @param boolean $active
     * @return VoucherCode
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
     * Set validFromDate
     *
     * @param \DateTime $validFromDate
     * @return VoucherCode
     */
    public function setValidFromDate($validFromDate)
    {
        $this->validFromDate = $validFromDate;
    
        return $this;
    }

    /**
     * Get validFromDate
     *
     * @return \DateTime 
     */
    public function getValidFromDate()
    {
        return $this->validFromDate;
    }

    /**
     * Set expiryDate
     *
     * @param \DateTime $expiryDate
     * @return VoucherCode
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    
        return $this;
    }

    /**
     * Get expiryDate
     *
     * @return \DateTime 
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return VoucherCode
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
     * @return VoucherCode
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
}