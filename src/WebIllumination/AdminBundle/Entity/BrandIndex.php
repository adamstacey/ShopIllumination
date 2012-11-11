<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brand_index")
 * @ORM\HasLifecycleCallbacks()
 */
class BrandIndex
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="brand_id", type="integer", length=11)
     */
    private $brandId;
    
    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;
	            
    /**
     * @ORM\Column(name="request_a_brochure", type="integer", length=1)
     */
    private $requestABrochure;
    
    /**
     * @ORM\Column(name="brochure_web_address", type="string", length=255)
     */
    private $brochureWebAddress;
    
     /**
     * @ORM\Column(name="request_a_sample", type="integer", length=1)
     */
    private $requestASample;
    
    /**
     * @ORM\Column(name="sample_web_address", type="string", length=255)
     */
    private $sampleWebAddress;
    
    /**
     * @ORM\Column(name="hide_prices", type="integer", length=1)
     */
    private $hidePrices;
    
    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="integer", length=1)
     */
    private $showPricesOutOfHours;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="integer", length=1)
     */
    private $membershipCardDiscountAvailable;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4)
     */
    private $maximumMembershipCardDiscount;
    
	/**
     * @ORM\Column(name="logo_image_id", type="integer", length=11)
     */
    private $logoImageId;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;
    
    /**
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
        
    /**
     * @ORM\Column(name="about", type="text")
     */
    private $about;
    
    /**
     * @ORM\Column(name="history", type="text")
     */
    private $history;
    
    /**
     * @ORM\Column(name="more_information", type="text")
     */
    private $moreInformation; 
    
    /**
     * @ORM\Column(name="page_title", type="string", length=255)
     */
    private $pageTitle;
    
    /**
     * @ORM\Column(name="header", type="string", length=255)
     */
    private $header;
    
    /**
     * @ORM\Column(name="meta_description", type="text")
     */
    private $metaDescription;
    
    /**
     * @ORM\Column(name="meta_keywords", type="text")
     */
    private $metaKeywords;
    
    /**
     * @ORM\Column(name="search_words", type="text")
     */
    private $searchWords;
    
    /**
     * @ORM\Column(name="url", type="text")
     */
    private $url;
    
    /**
     * @ORM\Column(name="product_count", type="integer", length=11)
     */
    private $productCount;
           
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
     * Set requestABrochure
     *
     * @param integer $requestABrochure
     */
    public function setRequestABrochure($requestABrochure)
    {
        $this->requestABrochure = $requestABrochure;
    }

    /**
     * Get requestABrochure
     *
     * @return integer 
     */
    public function getRequestABrochure()
    {
        return $this->requestABrochure;
    }

    /**
     * Set brochureWebAddress
     *
     * @param string $brochureWebAddress
     */
    public function setBrochureWebAddress($brochureWebAddress)
    {
        $this->brochureWebAddress = $brochureWebAddress;
    }

    /**
     * Get brochureWebAddress
     *
     * @return string 
     */
    public function getBrochureWebAddress()
    {
        return $this->brochureWebAddress;
    }

    /**
     * Set requestASample
     *
     * @param integer $requestASample
     */
    public function setRequestASample($requestASample)
    {
        $this->requestASample = $requestASample;
    }

    /**
     * Get requestASample
     *
     * @return integer 
     */
    public function getRequestASample()
    {
        return $this->requestASample;
    }

    /**
     * Set sampleWebAddress
     *
     * @param string $sampleWebAddress
     */
    public function setSampleWebAddress($sampleWebAddress)
    {
        $this->sampleWebAddress = $sampleWebAddress;
    }

    /**
     * Get sampleWebAddress
     *
     * @return string 
     */
    public function getSampleWebAddress()
    {
        return $this->sampleWebAddress;
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
     * Set logoImageId
     *
     * @param integer $logoImageId
     */
    public function setLogoImageId($logoImageId)
    {
        $this->logoImageId = $logoImageId;
    }

    /**
     * Get logoImageId
     *
     * @return integer 
     */
    public function getLogoImageId()
    {
        return $this->logoImageId;
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
     * Set about
     *
     * @param text $about
     */
    public function setAbout($about)
    {
        $this->about = $about;
    }

    /**
     * Get about
     *
     * @return text 
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set history
     *
     * @param text $history
     */
    public function setHistory($history)
    {
        $this->history = $history;
    }

    /**
     * Get history
     *
     * @return text 
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Set moreInformation
     *
     * @param text $moreInformation
     */
    public function setMoreInformation($moreInformation)
    {
        $this->moreInformation = $moreInformation;
    }

    /**
     * Get moreInformation
     *
     * @return text 
     */
    public function getMoreInformation()
    {
        return $this->moreInformation;
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
     * Set metaDescription
     *
     * @param text $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * Get metaDescription
     *
     * @return text 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaKeywords
     *
     * @param text $metaKeywords
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    }

    /**
     * Get metaKeywords
     *
     * @return text 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
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
     * Set url
     *
     * @param text $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return text 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set productCount
     *
     * @param integer $productCount
     */
    public function setProductCount($productCount)
    {
        $this->productCount = $productCount;
    }

    /**
     * Get productCount
     *
     * @return integer 
     */
    public function getProductCount()
    {
        return $this->productCount;
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