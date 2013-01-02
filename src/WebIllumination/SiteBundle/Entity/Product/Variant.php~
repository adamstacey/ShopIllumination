<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_variants")
 * @ORM\HasLifecycleCallbacks()
 */
class Variant
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product", inversedBy="variants")
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\ProductToFeature", mappedBy="variant", cascade={"all"})
     */
    private $features;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Description", mappedBy="variant", cascade={"all"})
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\ProductToOption", mappedBy="product", cascade={"all"})
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Price", mappedBy="product", cascade={"all"})
     */
    private $prices;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status = 'a';

    /**
     * @ORM\Column(name="product_code", type="string", length=100)
     */
    private $productCode = '';

    /**
     * @ORM\Column(name="alternative_product_codes", type="text", nullable=true)
     */
    private $alternativeProductCodes = '';

    /**
     * @ORM\Column(name="mpn", type="string", length=100, nullable=true)
     */
    private $mpn = '';

    /**
     * @ORM\Column(name="ean", type="string", length=14, nullable=true)
     */
    private $ean = '';

    /**
     * @ORM\Column(name="upc", type="string", length=12, nullable=true)
     */
    private $upc = '';

    /**
     * @ORM\Column(name="jan", type="string", length=13, nullable=true)
     */
    private $jan = '';

    /**
     * @ORM\Column(name="isbn", type="string", length=13, nullable=true)
     */
    private $isbn = '';

    /**
     * @ORM\Column(name="weight", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $weight = 0;

    /**
     * @ORM\Column(name="length", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $length = 0;

    /**
     * @ORM\Column(name="width", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $width = 0;

    /**
     * @ORM\Column(name="height", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $height = 0;

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

    private $active;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set status
     *
     * @param string $status
     * @return Variant
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
     * Set productCode
     *
     * @param string $productCode
     * @return Variant
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
     * Set alternativeProductCodes
     *
     * @param string $alternativeProductCodes
     * @return Variant
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
     * Set mpn
     *
     * @param string $mpn
     * @return Variant
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
     * @return Variant
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
     * @return Variant
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
     * @return Variant
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
     * @return Variant
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
     * @return Variant
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
     * @return Variant
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
     * @return Variant
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
     * @return Variant
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Variant
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
     * @return Variant
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
     * Add options
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToOption $options
     * @return Variant
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
     * @return Variant
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
     * Add prices
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Price $prices
     * @return Variant
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
     * Set product
     *
     * @param \WebIllumination\SiteBundle\Entity\Product $product
     * @return Variant
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
     * Add descriptions
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Description $descriptions
     * @return Variant
     */
    public function addDescription(\WebIllumination\SiteBundle\Entity\Product\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
    
        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Description $descriptions
     */
    public function removeDescription(\WebIllumination\SiteBundle\Entity\Product\Description $descriptions)
    {
        $this->descriptions->removeElement($descriptions);
    }

    /**
     * Get descriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }
}