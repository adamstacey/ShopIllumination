<?php
namespace KAC\SiteBundle\Entity\Product\Variant;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use KAC\SiteBundle\Entity\DescriptionInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_variant_descriptions")
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
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product\Variant", inversedBy="descriptions")
     */
    private $variant;

    /**
     * @ORM\Column(name="locale", type="string", length=5   )
     * @Assert\Locale(groups={"flow_site_new_product_step4", "site_edit_product_description"})
     */
    private $locale = "en_GB";

    /**
     * @ORM\Column(name="override", type="boolean")
     */
    private $override = false;

    /**
     * @ORM\Column(name="extra_keywords", type="string", length=255, nullable=true)
     */
    private $extraKeywords;

    /**
     * @ORM\Column(name="key_message", type="string", length=255, nullable=true)
     */
    private $keyMessage;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description = "";

    /**
     * @ORM\Column(name="brand_description", type="text", nullable=true)
     */
    private $brandDescription = "";

    /**
     * @ORM\Column(name="page_title", type="string", length=255, nullable=true)
     */
    private $pageTitle;

    /**
     * @ORM\Column(name="header", type="string", length=255, nullable=true)
     */
    private $header;

    /**
     * @ORM\Column(name="meta_description", type="text", nullable=true)
     */
    private $metaDescription;

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

    public function __clone()
    {
        if ($this->id) {
            $this->id = null;
        }
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
     * Set variant
     *
     * @param \KAC\SiteBundle\Entity\Product\Variant $variant
     * @return Description
     */
    public function setVariant(\KAC\SiteBundle\Entity\Product\Variant $variant = null)
    {
        $this->variant = $variant;

        return $this;
    }

    /**
     * Get variant
     *
     * @return \KAC\SiteBundle\Entity\Product\Variant
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * Set brandDescription
     *
     * @param string $brandDescription
     * @return Description
     */
    public function setBrandDescription($brandDescription)
    {
        $this->brandDescription = $brandDescription;
    
        return $this;
    }

    /**
     * Get brandDescription
     *
     * @return string 
     */
    public function getBrandDescription()
    {
        return $this->brandDescription;
    }

    /**
     * Set extraKeywords
     *
     * @param string $extraKeywords
     * @return Description
     */
    public function setExtraKeywords($extraKeywords)
    {
        $this->extraKeywords = $extraKeywords;
    
        return $this;
    }

    /**
     * Get extraKeywords
     *
     * @return string 
     */
    public function getExtraKeywords()
    {
        return $this->extraKeywords;
    }

    /**
     * Set keyMessage
     *
     * @param string $keyMessage
     * @return Description
     */
    public function setKeyMessage($keyMessage)
    {
        $this->keyMessage = $keyMessage;
    
        return $this;
    }

    /**
     * Get keyMessage
     *
     * @return string 
     */
    public function getKeyMessage()
    {
        return $this->keyMessage;
    }

    /**
     * Set override
     *
     * @param boolean $override
     * @return Description
     */
    public function setOverride($override)
    {
        $this->override = $override;
    
        return $this;
    }

    /**
     * Get override
     *
     * @return boolean 
     */
    public function getOverride()
    {
        return $this->override;
    }
}