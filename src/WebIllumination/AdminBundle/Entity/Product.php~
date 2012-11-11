<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
    
    /**
     * @ORM\Column(name="product_group_id", type="integer", length=11)
     */
    private $productGroupId;
    
    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;
    
    /**
     * @ORM\Column(name="checked", type="integer", length=1)
     */
    private $checked;
    
    /**
     * @ORM\Column(name="available_for_purchase", type="integer", length=1)
     */
    private $availableForPurchase;
    
    /**
     * @ORM\Column(name="brand_id", type="integer", length=11)
     */
    private $brandId;
    
    /**
     * @ORM\Column(name="product_code", type="string", length=100)
     */
    private $productCode;
    
    /**
     * @ORM\Column(name="product_group_code", type="string", length=100)
     */
    private $productGroupCode;
    
    /**
     * @ORM\Column(name="alternative_product_codes", type="text")
     */
    private $alternativeProductCodes;
    
    /**
     * @ORM\Column(name="feature_comparison", type="integer", length=1)
     */
    private $featureComparison;
    
    /**
     * @ORM\Column(name="downloadable", type="integer", length=1)
     */
    private $downloadable;
    
    /**
     * @ORM\Column(name="special_offer", type="integer", length=1)
     */
    private $specialOffer;
    
    /**
     * @ORM\Column(name="recommended", type="integer", length=1)
     */
    private $recommended;
    
    /**
     * @ORM\Column(name="accessory", type="integer", length=1)
     */
    private $accessory;
    
    /**
     * @ORM\Column(name="new", type="integer", length=1)
     */
    private $new;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="integer", length=1)
     */
    private $membershipCardDiscountAvailable;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4)
     */
    private $maximumMembershipCardDiscount;
    
    /**
     * @ORM\Column(name="mpn", type="string", length=100)
     */
    private $mpn;
    
    /**
     * @ORM\Column(name="ean", type="string", length=14)
     */
    private $ean;
    
    /**
     * @ORM\Column(name="upc", type="string", length=12)
     */
    private $upc;
    
    /**
     * @ORM\Column(name="jan", type="string", length=13)
     */
    private $jan;
    
    /**
     * @ORM\Column(name="isbn", type="string", length=13)
     */
    private $isbn;
    
    /**
     * @ORM\Column(name="weight", type="decimal", precision=12, scale=2)
     */
    private $weight;
    
    /**
     * @ORM\Column(name="length", type="decimal", precision=12, scale=2)
     */
    private $length;
 	
 	/**
     * @ORM\Column(name="width", type="decimal", precision=12, scale=2)
     */
    private $width;
    
    /**
     * @ORM\Column(name="height", type="decimal", precision=12, scale=2)
     */
    private $height;   
    
    /**
     * @ORM\Column(name="delivery_band", type="decimal", precision=12, scale=4)
     */
    private $deliveryBand;
    
    /**
     * @ORM\Column(name="inherited_delivery_band", type="decimal", precision=12, scale=4)
     */
    private $inheritedDeliveryBand;
    
    /**
     * @ORM\Column(name="delivery_cost", type="decimal", precision=12, scale=4)
     */
    private $deliveryCost;
    
    /**
     * @ORM\Column(name="sample_request", type="integer", length=1)
     */
    private $sampleRequest;
    
    /**
     * @ORM\Column(name="hide_price", type="integer", length=1)
     */
    private $hidePrice;
    
    /**
     * @ORM\Column(name="show_price_out_of_hours", type="integer", length=1)
     */
    private $showPriceOutOfHours;
        
    /**
     * @ORM\Column(name="last_checked", type="datetime")
     */
    private $lastChecked;
    
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
	    $this->lastChecked = new \DateTime();
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\PreUpdate
	 */
    public function update()
    {
    	$this->lastChecked = new \DateTime();
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
     * Set availableForPurchase
     *
     * @param string $availableForPurchase
     */
    public function setAvailableForPurchase($availableForPurchase)
    {
        $this->availableForPurchase = $availableForPurchase;
    }

    /**
     * Get availableForPurchase
     *
     * @return string 
     */
    public function getAvailableForPurchase()
    {
        return $this->availableForPurchase;
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
    			return 'amber';
    	}
        return '';
    }

    /**
     * Set brandId
     *
     * @param integer $brandId
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;
    }

    /**
     * Get brandId
     *
     * @return integer 
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * Set productCode
     *
     * @param string $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * Get productCode
     *
     * @return string 
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * Set alternativeProductCodes
     *
     * @param text $alternativeProductCodes
     */
    public function setAlternativeProductCodes($alternativeProductCodes)
    {
        $this->alternativeProductCodes = $alternativeProductCodes;
    }

    /**
     * Get alternativeProductCodes
     *
     * @return text 
     */
    public function getAlternativeProductCodes()
    {
        return $this->alternativeProductCodes;
    }

    /**
     * Set featureComparison
     *
     * @param integer $featureComparison
     */
    public function setFeatureComparison($featureComparison)
    {
        $this->featureComparison = $featureComparison;
    }

    /**
     * Get featureComparison
     *
     * @return integer 
     */
    public function getFeatureComparison()
    {
        return $this->featureComparison;
    }

    /**
     * Set downloadable
     *
     * @param integer $downloadable
     */
    public function setDownloadable($downloadable)
    {
        $this->downloadable = $downloadable;
    }

    /**
     * Get downloadable
     *
     * @return integer 
     */
    public function getDownloadable()
    {
        return $this->downloadable;
    }
	
	/**
     * Set membershipCardDiscountAvailable
     *
     * @param string $membershipCardDiscountAvailable
     */
    public function setMembershipCardDiscountAvailable($membershipCardDiscountAvailable)
    {
        $this->membershipCardDiscountAvailable = $membershipCardDiscountAvailable;
    }

    /**
     * Get membershipCardDiscountAvailable
     *
     * @return string 
     */
    public function getMembershipCardDiscountAvailable()
    {
        return $this->membershipCardDiscountAvailable;
    }
    
    /**
     * Set maximumMembershipCardDiscount
     *
     * @param string $maximumMembershipCardDiscount
     */
    public function setMaximumMembershipCardDiscount($maximumMembershipCardDiscount)
    {
        $this->maximumMembershipCardDiscount = $maximumMembershipCardDiscount;
    }

    /**
     * Get maximumMembershipCardDiscount
     *
     * @return string 
     */
    public function getMaximumMembershipCardDiscount()
    {
        return $this->maximumMembershipCardDiscount;
    }
	
    /**
     * Set mpn
     *
     * @param string $mpn
     */
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;
    }

    /**
     * Get mpn
     *
     * @return string 
     */
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * Set ean
     *
     * @param string $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * Get ean
     *
     * @return string 
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set upc
     *
     * @param string $upc
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;
    }

    /**
     * Get upc
     *
     * @return string 
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * Set jan
     *
     * @param string $jan
     */
    public function setJan($jan)
    {
        $this->jan = $jan;
    }

    /**
     * Get jan
     *
     * @return string 
     */
    public function getJan()
    {
        return $this->jan;
    }

    /**
     * Set isbn
     *
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * Get isbn
     *
     * @return string 
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set weight
     *
     * @param decimal $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get weight
     *
     * @return decimal 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set length
     *
     * @param decimal $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * Get length
     *
     * @return decimal 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param decimal $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get width
     *
     * @return decimal 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param decimal $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get height
     *
     * @return decimal 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set hidePrice
     *
     * @param integer $hidePrice
     */
    public function setHidePrice($hidePrice)
    {
        $this->hidePrice = $hidePrice;
    }

    /**
     * Get hidePrice
     *
     * @return integer 
     */
    public function getHidePrice()
    {
        return $this->hidePrice;
    }

    /**
     * Set showPriceOutOfHours
     *
     * @param integer $showPriceOutOfHours
     */
    public function setShowPriceOutOfHours($showPriceOutOfHours)
    {
        $this->showPriceOutOfHours = $showPriceOutOfHours;
    }

    /**
     * Get showPriceOutOfHours
     *
     * @return integer 
     */
    public function getShowPriceOutOfHours()
    {
        return $this->showPriceOutOfHours;
    }

    /**
     * Set specialOffer
     *
     * @param integer $specialOffer
     */
    public function setSpecialOffer($specialOffer)
    {
        $this->specialOffer = $specialOffer;
    }

    /**
     * Get specialOffer
     *
     * @return integer 
     */
    public function getSpecialOffer()
    {
        return $this->specialOffer;
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
     * Set recommended
     *
     * @param integer $recommended
     */
    public function setRecommended($recommended)
    {
        $this->recommended = $recommended;
    }

    /**
     * Get recommended
     *
     * @return integer 
     */
    public function getRecommended()
    {
        return $this->recommended;
    }

    /**
     * Set accessory
     *
     * @param integer $accessory
     */
    public function setAccessory($accessory)
    {
        $this->accessory = $accessory;
    }

    /**
     * Get accessory
     *
     * @return integer 
     */
    public function getAccessory()
    {
        return $this->accessory;
    }

    /**
     * Set new
     *
     * @param integer $new
     */
    public function setNew($new)
    {
        $this->new = $new;
    }

    /**
     * Get new
     *
     * @return integer 
     */
    public function getNew()
    {
        return $this->new;
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
     * Set deliveryCost
     *
     * @param decimal $deliveryCost
     */
    public function setDeliveryCost($deliveryCost)
    {
        $this->deliveryCost = $deliveryCost;
    }

    /**
     * Get deliveryCost
     *
     * @return decimal 
     */
    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }

    /**
     * Set productGroupId
     *
     * @param integer $productGroupId
     */
    public function setProductGroupId($productGroupId)
    {
        $this->productGroupId = $productGroupId;
    }

    /**
     * Get productGroupId
     *
     * @return integer 
     */
    public function getProductGroupId()
    {
        return $this->productGroupId;
    }

    /**
     * Set checked
     *
     * @param integer $checked
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;
    }

    /**
     * Get checked
     *
     * @return integer 
     */
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * Set sampleRequest
     *
     * @param integer $sampleRequest
     */
    public function setSampleRequest($sampleRequest)
    {
        $this->sampleRequest = $sampleRequest;
    }

    /**
     * Get sampleRequest
     *
     * @return integer 
     */
    public function getSampleRequest()
    {
        return $this->sampleRequest;
    }

    /**
     * Set lastChecked
     *
     * @param datetime $lastChecked
     */
    public function setLastChecked($lastChecked)
    {
        $this->lastChecked = $lastChecked;
    }

    /**
     * Get lastChecked
     *
     * @return datetime 
     */
    public function getLastChecked()
    {
        return $this->lastChecked;
    }

    /**
     * Set productGroupCode
     *
     * @param string $productGroupCode
     */
    public function setProductGroupCode($productGroupCode)
    {
        $this->productGroupCode = $productGroupCode;
    }

    /**
     * Get productGroupCode
     *
     * @return string 
     */
    public function getProductGroupCode()
    {
        return $this->productGroupCode;
    }

    /**
     * Set inheritedDeliveryBand
     *
     * @param decimal $inheritedDeliveryBand
     */
    public function setInheritedDeliveryBand($inheritedDeliveryBand)
    {
        $this->inheritedDeliveryBand = $inheritedDeliveryBand;
    }

    /**
     * Get inheritedDeliveryBand
     *
     * @return decimal 
     */
    public function getInheritedDeliveryBand()
    {
        return $this->inheritedDeliveryBand;
    }
}