<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
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
     * @ORM\OneToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Description", mappedBy="product")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\ProductToOption", mappedBy="product")
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\ProductToFeature", mappedBy="product")
     */
    private $features;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\ProductToDepartment", mappedBy="product")
     */
    private $departments;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Link", mappedBy="product")
     */
    private $links;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Price", mappedBy="product")
     */
    private $prices;
    
    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;
    
    /**
     * @ORM\Column(name="checked", type="boolean")
     */
    private $checked;
    
    /**
     * @ORM\Column(name="available_for_purchase", type="boolean")
     */
    private $availableForPurchase;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Brand")
     */
    private $brand;
    
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
     * @ORM\Column(name="feature_comparison", type="boolean")
     */
    private $featureComparison;
    
    /**
     * @ORM\Column(name="downloadable", type="boolean")
     */
    private $downloadable;
    
    /**
     * @ORM\Column(name="special_offer", type="boolean")
     */
    private $specialOffer;
    
    /**
     * @ORM\Column(name="recommended", type="boolean")
     */
    private $recommended;
    
    /**
     * @ORM\Column(name="accessory", type="boolean")
     */
    private $accessory;
    
    /**
     * @ORM\Column(name="new", type="boolean")
     */
    private $new;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="boolean")
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
     * @ORM\Column(name="sample_request", type="boolean")
     */
    private $sampleRequest;
    
    /**
     * @ORM\Column(name="hide_price", type="boolean")
     */
    private $hidePrice;
    
    /**
     * @ORM\Column(name="show_price_out_of_hours", type="boolean")
     */
    private $showPriceOutOfHours;
        
    /**
     * @ORM\Column(name="last_checked", type="datetime")
     */
    private $lastChecked;

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
    			return 'amber';
    	}
        return '';
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->links = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prices = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set productGroupId
     *
     * @param integer $productGroupId
     * @return Product
     */
    public function setProductGroupId($productGroupId)
    {
        $this->productGroupId = $productGroupId;
    
        return $this;
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
     * Set status
     *
     * @param string $status
     * @return Product
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
     * Set checked
     *
     * @param boolean $checked
     * @return Product
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;
    
        return $this;
    }

    /**
     * Get checked
     *
     * @return boolean 
     */
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * Set availableForPurchase
     *
     * @param boolean $availableForPurchase
     * @return Product
     */
    public function setAvailableForPurchase($availableForPurchase)
    {
        $this->availableForPurchase = $availableForPurchase;
    
        return $this;
    }

    /**
     * Get availableForPurchase
     *
     * @return boolean 
     */
    public function getAvailableForPurchase()
    {
        return $this->availableForPurchase;
    }

    /**
     * Set productCode
     *
     * @param string $productCode
     * @return Product
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    
        return $this;
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
     * Set productGroupCode
     *
     * @param string $productGroupCode
     * @return Product
     */
    public function setProductGroupCode($productGroupCode)
    {
        $this->productGroupCode = $productGroupCode;
    
        return $this;
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
     * Set alternativeProductCodes
     *
     * @param string $alternativeProductCodes
     * @return Product
     */
    public function setAlternativeProductCodes($alternativeProductCodes)
    {
        $this->alternativeProductCodes = $alternativeProductCodes;
    
        return $this;
    }

    /**
     * Get alternativeProductCodes
     *
     * @return string 
     */
    public function getAlternativeProductCodes()
    {
        return $this->alternativeProductCodes;
    }

    /**
     * Set featureComparison
     *
     * @param boolean $featureComparison
     * @return Product
     */
    public function setFeatureComparison($featureComparison)
    {
        $this->featureComparison = $featureComparison;
    
        return $this;
    }

    /**
     * Get featureComparison
     *
     * @return boolean 
     */
    public function getFeatureComparison()
    {
        return $this->featureComparison;
    }

    /**
     * Set downloadable
     *
     * @param boolean $downloadable
     * @return Product
     */
    public function setDownloadable($downloadable)
    {
        $this->downloadable = $downloadable;
    
        return $this;
    }

    /**
     * Get downloadable
     *
     * @return boolean 
     */
    public function getDownloadable()
    {
        return $this->downloadable;
    }

    /**
     * Set specialOffer
     *
     * @param boolean $specialOffer
     * @return Product
     */
    public function setSpecialOffer($specialOffer)
    {
        $this->specialOffer = $specialOffer;
    
        return $this;
    }

    /**
     * Get specialOffer
     *
     * @return boolean 
     */
    public function getSpecialOffer()
    {
        return $this->specialOffer;
    }

    /**
     * Set recommended
     *
     * @param boolean $recommended
     * @return Product
     */
    public function setRecommended($recommended)
    {
        $this->recommended = $recommended;
    
        return $this;
    }

    /**
     * Get recommended
     *
     * @return boolean 
     */
    public function getRecommended()
    {
        return $this->recommended;
    }

    /**
     * Set accessory
     *
     * @param boolean $accessory
     * @return Product
     */
    public function setAccessory($accessory)
    {
        $this->accessory = $accessory;
    
        return $this;
    }

    /**
     * Get accessory
     *
     * @return boolean 
     */
    public function getAccessory()
    {
        return $this->accessory;
    }

    /**
     * Set new
     *
     * @param boolean $new
     * @return Product
     */
    public function setNew($new)
    {
        $this->new = $new;
    
        return $this;
    }

    /**
     * Get new
     *
     * @return boolean 
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Set membershipCardDiscountAvailable
     *
     * @param boolean $membershipCardDiscountAvailable
     * @return Product
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
     * @return Product
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
     * Set mpn
     *
     * @param string $mpn
     * @return Product
     */
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;
    
        return $this;
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
     * @return Product
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    
        return $this;
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
     * @return Product
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;
    
        return $this;
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
     * @return Product
     */
    public function setJan($jan)
    {
        $this->jan = $jan;
    
        return $this;
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
     * @return Product
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    
        return $this;
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
     * @param float $weight
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return float 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set length
     *
     * @param float $length
     * @return Product
     */
    public function setLength($length)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return float 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param float $width
     * @return Product
     */
    public function setWidth($width)
    {
        $this->width = $width;
    
        return $this;
    }

    /**
     * Get width
     *
     * @return float 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param float $height
     * @return Product
     */
    public function setHeight($height)
    {
        $this->height = $height;
    
        return $this;
    }

    /**
     * Get height
     *
     * @return float 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set deliveryBand
     *
     * @param float $deliveryBand
     * @return Product
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
     * @return Product
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
     * Set deliveryCost
     *
     * @param float $deliveryCost
     * @return Product
     */
    public function setDeliveryCost($deliveryCost)
    {
        $this->deliveryCost = $deliveryCost;
    
        return $this;
    }

    /**
     * Get deliveryCost
     *
     * @return float 
     */
    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }

    /**
     * Set sampleRequest
     *
     * @param boolean $sampleRequest
     * @return Product
     */
    public function setSampleRequest($sampleRequest)
    {
        $this->sampleRequest = $sampleRequest;
    
        return $this;
    }

    /**
     * Get sampleRequest
     *
     * @return boolean 
     */
    public function getSampleRequest()
    {
        return $this->sampleRequest;
    }

    /**
     * Set hidePrice
     *
     * @param boolean $hidePrice
     * @return Product
     */
    public function setHidePrice($hidePrice)
    {
        $this->hidePrice = $hidePrice;
    
        return $this;
    }

    /**
     * Get hidePrice
     *
     * @return boolean 
     */
    public function getHidePrice()
    {
        return $this->hidePrice;
    }

    /**
     * Set showPriceOutOfHours
     *
     * @param boolean $showPriceOutOfHours
     * @return Product
     */
    public function setShowPriceOutOfHours($showPriceOutOfHours)
    {
        $this->showPriceOutOfHours = $showPriceOutOfHours;
    
        return $this;
    }

    /**
     * Get showPriceOutOfHours
     *
     * @return boolean 
     */
    public function getShowPriceOutOfHours()
    {
        return $this->showPriceOutOfHours;
    }

    /**
     * Set lastChecked
     *
     * @param \DateTime $lastChecked
     * @return Product
     */
    public function setLastChecked($lastChecked)
    {
        $this->lastChecked = $lastChecked;
    
        return $this;
    }

    /**
     * Get lastChecked
     *
     * @return \DateTime 
     */
    public function getLastChecked()
    {
        return $this->lastChecked;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
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
     * @return Product
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
     * Set description
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Description $description
     * @return Product
     */
    public function setDescription(\WebIllumination\SiteBundle\Entity\Product\Description $description = null)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Description 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add options
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToOption $options
     * @return Product
     */
    public function addOption(\WebIllumination\SiteBundle\Entity\ProductToOption $options)
    {
        $this->options[] = $options;
    
        return $this;
    }

    /**
     * Remove options
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToOption $options
     */
    public function removeOption(\WebIllumination\SiteBundle\Entity\ProductToOption $options)
    {
        $this->options->removeElement($options);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Add features
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToFeature $features
     * @return Product
     */
    public function addFeature(\WebIllumination\SiteBundle\Entity\ProductToFeature $features)
    {
        $this->features[] = $features;
    
        return $this;
    }

    /**
     * Remove features
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToFeature $features
     */
    public function removeFeature(\WebIllumination\SiteBundle\Entity\ProductToFeature $features)
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
     * Add departments
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToDepartment $departments
     * @return Product
     */
    public function addDepartment(\WebIllumination\SiteBundle\Entity\ProductToDepartment $departments)
    {
        $this->departments[] = $departments;
    
        return $this;
    }

    /**
     * Remove departments
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToDepartment $departments
     */
    public function removeDepartment(\WebIllumination\SiteBundle\Entity\ProductToDepartment $departments)
    {
        $this->departments->removeElement($departments);
    }

    /**
     * Get departments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Add links
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Link $links
     * @return Product
     */
    public function addLink(\WebIllumination\SiteBundle\Entity\Product\Link $links)
    {
        $this->links[] = $links;
    
        return $this;
    }

    /**
     * Remove links
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Link $links
     */
    public function removeLink(\WebIllumination\SiteBundle\Entity\Product\Link $links)
    {
        $this->links->removeElement($links);
    }

    /**
     * Get links
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Add prices
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Price $prices
     * @return Product
     */
    public function addPrice(\WebIllumination\SiteBundle\Entity\Product\Price $prices)
    {
        $this->prices[] = $prices;
    
        return $this;
    }

    /**
     * Remove prices
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Price $prices
     */
    public function removePrice(\WebIllumination\SiteBundle\Entity\Product\Price $prices)
    {
        $this->prices->removeElement($prices);
    }

    /**
     * Get prices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Set brand
     *
     * @param \WebIllumination\SiteBundle\Entity\Brand $brand
     * @return Product
     */
    public function setBrand(\WebIllumination\SiteBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return \WebIllumination\SiteBundle\Entity\Brand 
     */
    public function getBrand()
    {
        return $this->brand;
    }
}