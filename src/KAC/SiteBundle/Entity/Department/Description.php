<?php
namespace KAC\SiteBundle\Entity\Department;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use KAC\SiteBundle\Entity\DescriptionInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="department_descriptions")
 * @ORM\HasLifecycleCallbacks()
 */
class Description implements DescriptionInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Department", inversedBy="descriptions")
     */
    private $department;
        
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale = "en_GB";
    
    /**
     * @ORM\Column(name="delivery_band_notes", type="text", nullable=true)
     */
    private $deliveryBandNotes;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(groups={"flow_site_new_department_step1"}, message="Enter a name.")
     */
    private $name;
    
    /**
     * @ORM\Column(name="google_department", type="text", nullable=true)
     */
    private $googleDepartment;
    
    /**
     * @ORM\Column(name="ebay_department", type="text", nullable=true)
     */
    private $ebayDepartment;
    
    /**
     * @ORM\Column(name="amazon_department", type="text", nullable=true)
     */
    private $amazonDepartment;
    
    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
        
    /**
     * @ORM\Column(name="menu_title", type="string", length=255, nullable=true)
     */
    private $menuTitle;
    
    /**
     * @ORM\Column(name="page_title", type="string", length=255, nullable=true)
     */
    private $pageTitle;
    
    /**
     * @ORM\Column(name="page_title_template", type="text", nullable=true)
     */
    private $pageTitleTemplate;
    
    /**
     * @ORM\Column(name="header", type="string", length=255, nullable=true)
     */
    private $header;
    
    /**
     * @ORM\Column(name="header_template", type="text", nullable=true)
     */
    private $headerTemplate;
    
    /**
     * @ORM\Column(name="meta_description", type="text", nullable=true)
     */
    private $metaDescription;
    
    /**
     * @ORM\Column(name="meta_description_template", type="text", nullable=true)
     */
    private $metaDescriptionTemplate;
    
    /**
     * @ORM\Column(name="meta_keywords", type="text", nullable=true)
     */
    private $metaKeywords;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Description
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
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
     * Set deliveryBandNotes
     *
     * @param string $deliveryBandNotes
     * @return Description
     */
    public function setDeliveryBandNotes($deliveryBandNotes)
    {
        $this->deliveryBandNotes = $deliveryBandNotes;
    
        return $this;
    }

    /**
     * Get deliveryBandNotes
     *
     * @return string 
     */
    public function getDeliveryBandNotes()
    {
        return $this->deliveryBandNotes;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Description
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
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
     * @param string $googleDepartment
     * @return Description
     */
    public function setGoogleDepartment($googleDepartment)
    {
        $this->googleDepartment = $googleDepartment;
    
        return $this;
    }

    /**
     * Get googleDepartment
     *
     * @return string 
     */
    public function getGoogleDepartment()
    {
        return $this->googleDepartment;
    }

    /**
     * Set ebayDepartment
     *
     * @param string $ebayDepartment
     * @return Description
     */
    public function setEbayDepartment($ebayDepartment)
    {
        $this->ebayDepartment = $ebayDepartment;
    
        return $this;
    }

    /**
     * Get ebayDepartment
     *
     * @return string 
     */
    public function getEbayDepartment()
    {
        return $this->ebayDepartment;
    }

    /**
     * Set amazonDepartment
     *
     * @param string $amazonDepartment
     * @return Description
     */
    public function setAmazonDepartment($amazonDepartment)
    {
        $this->amazonDepartment = $amazonDepartment;
    
        return $this;
    }

    /**
     * Get amazonDepartment
     *
     * @return string 
     */
    public function getAmazonDepartment()
    {
        return $this->amazonDepartment;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Description
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
     * Set menuTitle
     *
     * @param string $menuTitle
     * @return Description
     */
    public function setMenuTitle($menuTitle)
    {
        $this->menuTitle = $menuTitle;
    
        return $this;
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
     * @return Description
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    
        return $this;
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
     * Set pageTitleTemplate
     *
     * @param string $pageTitleTemplate
     * @return Description
     */
    public function setPageTitleTemplate($pageTitleTemplate)
    {
        $this->pageTitleTemplate = $pageTitleTemplate;
    
        return $this;
    }

    /**
     * Get pageTitleTemplate
     *
     * @return string 
     */
    public function getPageTitleTemplate()
    {
        return $this->pageTitleTemplate;
    }

    /**
     * Set header
     *
     * @param string $header
     * @return Description
     */
    public function setHeader($header)
    {
        $this->header = $header;
    
        return $this;
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
     * Set headerTemplate
     *
     * @param string $headerTemplate
     * @return Description
     */
    public function setHeaderTemplate($headerTemplate)
    {
        $this->headerTemplate = $headerTemplate;
    
        return $this;
    }

    /**
     * Get headerTemplate
     *
     * @return string 
     */
    public function getHeaderTemplate()
    {
        return $this->headerTemplate;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Description
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    
        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaDescriptionTemplate
     *
     * @param string $metaDescriptionTemplate
     * @return Description
     */
    public function setMetaDescriptionTemplate($metaDescriptionTemplate)
    {
        $this->metaDescriptionTemplate = $metaDescriptionTemplate;
    
        return $this;
    }

    /**
     * Get metaDescriptionTemplate
     *
     * @return string 
     */
    public function getMetaDescriptionTemplate()
    {
        return $this->metaDescriptionTemplate;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     * @return Description
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    
        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Description
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
     * @return Description
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
     * Set department
     *
     * @param \KAC\SiteBundle\Entity\Department $department
     * @return Description
     */
    public function setDepartment(\KAC\SiteBundle\Entity\Department $department = null)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return \KAC\SiteBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }
}