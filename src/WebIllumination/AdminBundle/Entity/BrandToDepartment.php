<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brand_to_department")
 * @ORM\HasLifecycleCallbacks()
 */
class BrandToDepartment
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
     * @ORM\Column(name="department_id", type="integer", length=11)
     */
    private $departmentId;
            
    /**
     * @ORM\Column(name="delivery_band", type="decimal", precision=12, scale=4)
     */
    private $deliveryBand;
    
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
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    public $updatedAt;

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
}