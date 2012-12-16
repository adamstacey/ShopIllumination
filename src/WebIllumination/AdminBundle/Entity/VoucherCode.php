<?php
namespace WebIllumination\AdminBundle\Entity;

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
        return 'bundles/webilluminationadmin/images/icons/'.$this->getActiveColour().'-light-icon.png';
    }
}