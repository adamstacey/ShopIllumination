<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="department_index")
 * @ORM\HasLifecycleCallbacks()
 */
class DepartmentIndex
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="department_id", type="integer", length="11")
     */
    private $departmentId;
    
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
     * @ORM\Column(name="inherited_delivery_band", type="decimal", precision="12", scale="4")
     */
    private $inheritedDeliveryBand;
    
    /**
     * @ORM\Column(name="check_delivery_band", type="integer", length="1")
     */
    private $checkDeliveryBand;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length="11")
     */
    private $displayOrder;
        
    /**
     * @ORM\Column(name="locale", type="string", length="2")
     */
    private $locale;
    
    /**
     * @ORM\Column(name="delivery_band_notes", type="text")
     */
    private $deliveryBandNotes;
    
    /**
     * @ORM\Column(name="name", type="string", length="255")
     */
    private $name;
    
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;
        
    /**
     * @ORM\Column(name="menu_title", type="string", length="255")
     */
    private $menuTitle;
    
    /**
     * @ORM\Column(name="page_title", type="string", length="255")
     */
    private $pageTitle;
    
    /**
     * @ORM\Column(name="page_title_template", type="text")
     */
    private $pageTitleTemplate;
    
    /**
     * @ORM\Column(name="header", type="string", length="255")
     */
    private $header;
    
    /**
     * @ORM\Column(name="header_template", type="text")
     */
    private $headerTemplate;
    
    /**
     * @ORM\Column(name="meta_description", type="text")
     */
    private $metaDescription;
    
    /**
     * @ORM\Column(name="meta_description_template", type="text")
     */
    private $metaDescriptionTemplate;
    
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
     * @ORM\Column(name="department_count", type="integer", length="11")
     */
    private $departmentCount;
    
    /**
     * @ORM\Column(name="departmentIds", type="text")
     */
    private $departmentIds;
    
    /**
     * @ORM\Column(name="departments", type="text")
     */
    private $departments;
    
    /**
     * @ORM\Column(name="product_count", type="integer", length="11")
     */
    private $productCount;
    
    /**
     * @ORM\Column(name="direct_product_count", type="integer", length="11")
     */
    private $directProductCount;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    public $updatedAt;

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
    		case 'a':
    			return 'green';
    		case 'h':
    			return 'orange';
    		case 'd':
    			return 'red';
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
     * Set menuTitle
     *
     * @param string $menuTitle
     */
    public function setMenuTitle($menuTitle)
    {
        $this->menuTitle = $menuTitle;
    }

    /**
     * Get menuTitle
     *
     * @return string 
     */
    public function getMenuTitle()
    {
        return $this->menuTitle;
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

    /**
     * Set checkDeliveryBand
     *
     * @param integer $checkDeliveryBand
     */
    public function setCheckDeliveryBand($checkDeliveryBand)
    {
        $this->checkDeliveryBand = $checkDeliveryBand;
    }

    /**
     * Get checkDeliveryBand
     *
     * @return integer 
     */
    public function getCheckDeliveryBand()
    {
        return $this->checkDeliveryBand;
    }

    /**
     * Set deliveryBandNotes
     *
     * @param text $deliveryBandNotes
     */
    public function setDeliveryBandNotes($deliveryBandNotes)
    {
        $this->deliveryBandNotes = $deliveryBandNotes;
    }

    /**
     * Get deliveryBandNotes
     *
     * @return text 
     */
    public function getDeliveryBandNotes()
    {
        return $this->deliveryBandNotes;
    }

    /**
     * Set pageTitleTemplate
     *
     * @param text $pageTitleTemplate
     */
    public function setPageTitleTemplate($pageTitleTemplate)
    {
        $this->pageTitleTemplate = $pageTitleTemplate;
    }

    /**
     * Get pageTitleTemplate
     *
     * @return text 
     */
    public function getPageTitleTemplate()
    {
        return $this->pageTitleTemplate;
    }

    /**
     * Set metaDescriptionTemplate
     *
     * @param text $metaDescriptionTemplate
     */
    public function setMetaDescriptionTemplate($metaDescriptionTemplate)
    {
        $this->metaDescriptionTemplate = $metaDescriptionTemplate;
    }

    /**
     * Get metaDescriptionTemplate
     *
     * @return text 
     */
    public function getMetaDescriptionTemplate()
    {
        return $this->metaDescriptionTemplate;
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
     * Set departmentCount
     *
     * @param integer $departmentCount
     */
    public function setDepartmentCount($departmentCount)
    {
        $this->departmentCount = $departmentCount;
    }

    /**
     * Get departmentCount
     *
     * @return integer 
     */
    public function getDepartmentCount()
    {
        return $this->departmentCount;
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
     * Set directProductCount
     *
     * @param integer $directProductCount
     */
    public function setDirectProductCount($directProductCount)
    {
        $this->directProductCount = $directProductCount;
    }

    /**
     * Get directProductCount
     *
     * @return integer 
     */
    public function getDirectProductCount()
    {
        return $this->directProductCount;
    }

    /**
     * Set headerTemplate
     *
     * @param text $headerTemplate
     */
    public function setHeaderTemplate($headerTemplate)
    {
        $this->headerTemplate = $headerTemplate;
    }

    /**
     * Get headerTemplate
     *
     * @return text 
     */
    public function getHeaderTemplate()
    {
        return $this->headerTemplate;
    }
}