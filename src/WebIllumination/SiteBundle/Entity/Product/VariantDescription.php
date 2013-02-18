<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use WebIllumination\SiteBundle\Entity\DescriptionInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_variant_descriptions")
 * @ORM\HasLifecycleCallbacks()
 */
class VariantDescription implements DescriptionInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Variant", inversedBy="descriptions")
     */
    private $variant;

    /**
     * @ORM\Column(name="locale", type="string", length=2)
     * @Assert\Locale(groups={"flow_site_new_product_step3", "site_edit_product_description"})
     */
    private $locale = "en_GB";

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="prefix", type="string", length=255, nullable=true)
     */
    private $prefix;

    /**
     * @ORM\Column(name="tagline", type="string", length=255, nullable=true)
     */
    private $tagline;

    /**
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank(groups={"flow_site_new_product_step3", "site_edit_product_overview"})
     * @Assert\Type(type="string", groups={"flow_site_new_product_step3", "site_edit_product_description"})
     */
    private $description = "";

    /**
     * @ORM\Column(name="short_description", type="text")
     */
    private $shortDescription;

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
     * @ORM\Column(name="search_words", type="text", nullable=true)
     */
    private $searchWords;

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
     * Set prefix
     *
     * @param string $prefix
     * @return Description
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
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
     * @return Description
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;

        return $this;
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
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Description
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
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
     * Set searchWords
     *
     * @param string $searchWords
     * @return Description
     */
    public function setSearchWords($searchWords)
    {
        $this->searchWords = $searchWords;

        return $this;
    }

    /**
     * Get searchWords
     *
     * @return string
     */
    public function getSearchWords()
    {
        return $this->searchWords;
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
     * Set product
     *
     * @param \WebIllumination\SiteBundle\Entity\Product $product
     * @return Description
     */
    public function setProduct(\WebIllumination\SiteBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \WebIllumination\SiteBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set variant
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Variant $variant
     * @return Description
     */
    public function setVariant(\WebIllumination\SiteBundle\Entity\Product\Variant $variant = null)
    {
        $this->variant = $variant;

        return $this;
    }

    /**
     * Get variant
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Variant
     */
    public function getVariant()
    {
        return $this->variant;
    }
}