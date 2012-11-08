<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="department_description", indexes={@ORM\index(name="search_idx", columns={"id", "department_id", "locale", "name", "created_at", "updated_at"})})
 * @ORM\HasLifecycleCallbacks()
 */
class DepartmentDescription
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
     * Get department
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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