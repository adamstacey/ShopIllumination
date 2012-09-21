<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_index")
 * @ORM\HasLifecycleCallbacks()
 */
class ProductIndex
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="product_id", type="integer", length="11")
     */
    private $productId;
    
    /**
     * @ORM\Column(name="product_group_id", type="integer", length="11")
     */
    private $productGroupId;
    
    /**
     * @ORM\Column(name="status", type="string", length="1")
     */
    private $status;
    
    /**
     * @ORM\Column(name="checked", type="integer", length="1")
     */
    private $checked;
    
    /**
     * @ORM\Column(name="available_for_purchase", type="integer", length="1")
     */
    private $availableForPurchase;
    
    /**
     * @ORM\Column(name="product", type="string", length="255")
     */
    private $product;
    
    /**
     * @ORM\Column(name="prefix", type="string", length="255")
     */
    private $prefix;
    
    /**
     * @ORM\Column(name="tagline", type="string", length="255")
     */
    private $tagline;
    
    /**
     * @ORM\Column(name="header", type="string", length="255")
     */
    private $header;
    
    /**
     * @ORM\Column(name="page_title", type="string", length="255")
     */
    private $pageTitle;
    
    /**
     * @ORM\Column(name="product_code", type="string", length="100")
     */
    private $productCode;
    
    /**
     * @ORM\Column(name="product_group_code", type="string", length="100")
     */
    private $productGroupCode;
    
	/**
     * @ORM\Column(name="alternative_product_codes", type="text")
     */
    private $alternativeProductCodes;
        
    /**
     * @ORM\Column(name="short_description", type="text")
     */
    private $shortDescription;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
        
    /**
     * @ORM\Column(name="search_words", type="text")
     */
    private $searchWords;
    
    /**
     * @ORM\Column(name="special_offer", type="integer", length="1")
     */
    private $specialOffer;
    
    /**
     * @ORM\Column(name="recommended", type="integer", length="1")
     */
    private $recommended;
    
    /**
     * @ORM\Column(name="accessory", type="integer", length="1")
     */
    private $accessory;
    
    /**
     * @ORM\Column(name="new", type="integer", length="1")
     */
    private $new;
    
    /**
     * @ORM\Column(name="hide_price", type="integer", length="1")
     */
    private $hidePrice;
    
    /**
     * @ORM\Column(name="show_price_out_of_hours", type="integer", length="1")
     */
    private $showPriceOutOfHours;
    
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
     * @ORM\Column(name="delivery_cost", type="decimal", precision="12", scale="4")
     */
    private $deliveryCost;
    
    /**
     * @ORM\Column(name="weight", type="decimal", precision="12", scale="4")
     */
    private $weight;
    
    /**
     * @ORM\Column(name="brand_id", type="integer", length="11")
     */
    private $brandId;
    
    /**
     * @ORM\Column(name="brand", type="string", length="255")
     */
    private $brand;
    
    /**
     * @ORM\Column(name="department_ids", type="text")
     */
    private $departmentIds;
    
    /**
     * @ORM\Column(name="departments", type="text")
     */
    private $departments;
    
    /**
     * @ORM\Column(name="department_paths", type="text")
     */
    private $departmentPaths;
    
   	/**
     * @ORM\Column(name="google_department", type="text")
     */
    private $googleDepartment;
    
    /**
     * @ORM\Column(name="ebay_department", type="text")
     */
    private $ebayDepartment;
    
    /**
     * @ORM\Column(name="amazon_department", type="text")
     */
    private $amazonDepartment;
    
    /**
     * @ORM\Column(name="product_options", type="text")
     */
    private $productOptions;
    	    
    /**
     * @ORM\Column(name="product_features", type="text")
     */
    private $productFeatures;
    
    /**
     * @ORM\Column(name="original_path", type="string", length="255", nullable="TRUE")
     */
    private $originalPath;
    
    /**
     * @ORM\Column(name="thumbnail_path", type="string", length="255", nullable="TRUE")
     */
    private $thumbnailPath;
    
    /**
     * @ORM\Column(name="medium_path", type="string", length="255", nullable="TRUE")
     */
    private $mediumPath;
    
    /**
     * @ORM\Column(name="large_path", type="string", length="255", nullable="TRUE")
     */
    private $largePath;
    
    /**
     * @ORM\Column(name="cost_price", type="decimal", precision="12", scale="4")
     */
    private $costPrice;
    
    /**
     * @ORM\Column(name="recommended_retail_price", type="decimal", precision="12", scale="4")
     */
    private $recommendedRetailPrice;
    
    /**
     * @ORM\Column(name="list_price", type="decimal", precision="12", scale="4")
     */
    private $listPrice;
    
    /**
     * @ORM\Column(name="membership_card_price", type="decimal", precision="12", scale="4")
     */
    private $membershipCardPrice;
    
    /**
     * @ORM\Column(name="discount", type="decimal", precision="12", scale="4")
     */
    private $discount;
    
    /**
     * @ORM\Column(name="savings", type="decimal", precision="12", scale="4")
     */
    private $savings;
    
    /**
     * @ORM\Column(name="currency_code", type="string", length="3")
     */
    private $currencyCode;
    
    /**
     * @ORM\Column(name="url", type="string", length="255")
     */
    private $url;
    
    /**
     * @ORM\Column(name="locale", type="string", length="2")
     */
    private $locale;
    
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
     * Set productId
     *
     * @param integer $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
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
     * Set brand
     *
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set departmentIds
     *
     * @param text $departmentIds
     */
    public function setDepartmentIds($departmentIds)
    {
        $this->departmentIds = $departmentIds;
    }

    /**
     * Get departmentIds
     *
     * @return text 
     */
    public function getDepartmentIds()
    {
        return $this->departmentIds;
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
     * Set departmentPaths
     *
     * @param text $departmentPaths
     */
    public function setDepartmentPaths($departmentPaths)
    {
        $this->departmentPaths = $departmentPaths;
    }

    /**
     * Get departmentPaths
     *
     * @return text 
     */
    public function getDepartmentPaths()
    {
        return $this->departmentPaths;
    }
    
    /**
     * Get departmentPathsObject
     *
     * @return text 
     */
    public function getFirstDepartmentPath()
    {
    	$departmentPaths = explode('|', $this->departmentPaths);
        return $departmentPaths[0];
    }

    /**
     * Set googleDepartment
     *
     * @param text $googleDepartment
     */
    public function setGoogleDepartment($googleDepartment)
    {
        $this->googleDepartment = $googleDepartment;
    }

    /**
     * Get googleDepartment
     *
     * @return text 
     */
    public function getGoogleDepartment()
    {
        return $this->googleDepartment;
    }

    /**
     * Set ebayDepartment
     *
     * @param text $ebayDepartment
     */
    public function setEbayDepartment($ebayDepartment)
    {
        $this->ebayDepartment = $ebayDepartment;
    }

    /**
     * Get ebayDepartment
     *
     * @return text 
     */
    public function getEbayDepartment()
    {
        return $this->ebayDepartment;
    }

    /**
     * Set amazonDepartment
     *
     * @param text $amazonDepartment
     */
    public function setAmazonDepartment($amazonDepartment)
    {
        $this->amazonDepartment = $amazonDepartment;
    }

    /**
     * Get amazonDepartment
     *
     * @return text 
     */
    public function getAmazonDepartment()
    {
        return $this->amazonDepartment;
    }

    /**
     * Set productOptions
     *
     * @param text $productOptions
     */
    public function setProductOptions($productOptions)
    {
        $this->productOptions = $productOptions;
    }

    /**
     * Get productOptions
     *
     * @return text 
     */
    public function getProductOptions()
    {
        return $this->productOptions;
    }

    /**
     * Set productFeatures
     *
     * @param text $productFeatures
     */
    public function setProductFeatures($productFeatures)
    {
        $this->productFeatures = $productFeatures;
    }

    /**
     * Get productFeatures
     *
     * @return text 
     */
    public function getProductFeatures()
    {
        return $this->productFeatures;
    }

    /**
     * Set thumbnailPath
     *
     * @param string $thumbnailPath
     */
    public function setThumbnailPath($thumbnailPath)
    {
        $this->thumbnailPath = $thumbnailPath;
    }

    /**
     * Get thumbnailPath
     *
     * @return string 
     */
    public function getThumbnailPath()
    {
        return $this->thumbnailPath;
    }

    /**
     * Set largePath
     *
     * @param string $largePath
     */
    public function setLargePath($largePath)
    {
        $this->largePath = $largePath;
    }

    /**
     * Get largePath
     *
     * @return string 
     */
    public function getLargePath()
    {
        return $this->largePath;
    }

    /**
     * Set product
     *
     * @param string $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * Get product
     *
     * @return string 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set header
     *
     * @param string $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * Get header
     *
     * @return string 
     */
    public function getHeader()
    {
        return $this->header;
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
     * Set shortDescription
     *
     * @param text $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * Get shortDescription
     *
     * @return text 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set searchWords
     *
     * @param text $searchWords
     */
    public function setSearchWords($searchWords)
    {
        $this->searchWords = $searchWords;
    }

    /**
     * Get searchWords
     *
     * @return text 
     */
    public function getSearchWords()
    {
        return $this->searchWords;
    }

    /**
     * Set costPrice
     *
     * @param decimal $costPrice
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;
    }

    /**
     * Get costPrice
     *
     * @return decimal 
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }

    /**
     * Set recommendedRetailPrice
     *
     * @param decimal $recommendedRetailPrice
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        $this->recommendedRetailPrice = $recommendedRetailPrice;
    }

    /**
     * Get recommendedRetailPrice
     *
     * @return decimal 
     */
    public function getRecommendedRetailPrice()
    {
        return $this->recommendedRetailPrice;
    }

    /**
     * Set listPrice
     *
     * @param decimal $listPrice
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;
    }

    /**
     * Get listPrice
     *
     * @return decimal 
     */
    public function getListPrice()
    {
        return $this->listPrice;
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
     * Set savings
     *
     * @param decimal $savings
     */
    public function setSavings($savings)
    {
        $this->savings = $savings;
    }

    /**
     * Get savings
     *
     * @return decimal 
     */
    public function getSavings()
    {
        return $this->savings;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set locale
     *
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * Get currencyCode
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
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
     * Set originalPath
     *
     * @param string $originalPath
     */
    public function setOriginalPath($originalPath)
    {
        $this->originalPath = $originalPath;
    }

    /**
     * Get originalPath
     *
     * @return string 
     */
    public function getOriginalPath()
    {
        return $this->originalPath;
    }

    /**
     * Set mediumPath
     *
     * @param string $mediumPath
     */
    public function setMediumPath($mediumPath)
    {
        $this->mediumPath = $mediumPath;
    }

    /**
     * Get mediumPath
     *
     * @return string 
     */
    public function getMediumPath()
    {
        return $this->mediumPath;
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
     * Set availableForPurchase
     *
     * @param integer $availableForPurchase
     */
    public function setAvailableForPurchase($availableForPurchase)
    {
        $this->availableForPurchase = $availableForPurchase;
    }

    /**
     * Get availableForPurchase
     *
     * @return integer 
     */
    public function getAvailableForPurchase()
    {
        return $this->availableForPurchase;
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
     * Set membershipCardPrice
     *
     * @param decimal $membershipCardPrice
     */
    public function setMembershipCardPrice($membershipCardPrice)
    {
        $this->membershipCardPrice = $membershipCardPrice;
    }

    /**
     * Get membershipCardPrice
     *
     * @return decimal 
     */
    public function getMembershipCardPrice()
    {
        return $this->membershipCardPrice;
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
     * Set prefix
     *
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Get prefix
     *
     * @return string 
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set tagline
     *
     * @param string $tagline
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;
    }

    /**
     * Get tagline
     *
     * @return string 
     */
    public function getTagline()
    {
        return $this->tagline;
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
     * Set pageTitle
     *
     * @param string $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get pageTitle
     *
     * @return string 
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }
}