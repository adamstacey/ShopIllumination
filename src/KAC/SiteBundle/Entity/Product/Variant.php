<?php
namespace KAC\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use KAC\SiteBundle\Entity\DescribableInterface;
use Symfony\Component\Validator\ExecutionContext;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_variants")
 * @ORM\HasLifecycleCallbacks()

 */
class Variant implements DescribableInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product", inversedBy="variants")
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Variant\Description", mappedBy="variant", cascade={"all"})
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\VariantToFeature", mappedBy="variant", cascade={"all"})
     * @ORM\OrderBy({"displayOrder" = "DESC"})
     * @Assert\Valid()
     */
    private $features;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\VariantToOption", mappedBy="variant", cascade={"all"})
     * @ORM\OrderBy({"displayOrder" = "DESC"})
     * @Assert\Valid()
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Price", mappedBy="variant", cascade={"all"})
     * @Assert\Count(min="1", groups={"flow_site_new_product_step3"})
     * @Assert\Valid()
     */
    private $prices;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Variant\Routing", mappedBy="variant", cascade={"all"})
     */
    private $routings;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     * @Assert\NotBlank(groups={"site_edit_product_overview"})
     * @Assert\Choice(choices={"a", "h", "d"})
     */
    private $status = 'a';

    /**
     * @ORM\Column(name="product_code", type="string", length=100)
     * @Assert\NotBlank(groups={"flow_site_new_product_step3", "site_edit_product_overview"})
     * @Assert\Type(type="string", groups={"flow_site_new_product_step3", "site_edit_product_overview"})
     */
    private $productCode = '';

    /**
     * @ORM\Column(name="alternative_product_codes", type="text", nullable=true)
     */
    private $alternativeProductCodes = '';

    /**
     * @ORM\Column(name="mpn", type="string", length=100, nullable=true)
     * @Assert\Type(type="string", groups={"site_edit_product_overview"})
     */
    private $mpn = '';

    /**
     * @ORM\Column(name="ean", type="string", length=14, nullable=true)
     * @Assert\Type(type="string", groups={"site_edit_product_overview"})
     */
    private $ean = '';

    /**
     * @ORM\Column(name="upc", type="string", length=12, nullable=true)
     * @Assert\Type(type="string", groups={"site_edit_product_overview"})
     */
    private $upc = '';

    /**
     * @ORM\Column(name="jan", type="string", length=13, nullable=true)
     * @Assert\Type(type="string", groups={"site_edit_product_overview"})
     */
    private $jan = '';

    /**
     * @ORM\Column(name="isbn", type="string", length=13, nullable=true)
     * @Assert\Type(type="string", groups={"site_edit_product_overview"})
     */
    private $isbn = '';

    /**
     * @ORM\Column(name="weight", type="decimal", precision=12, scale=2, nullable=true)
     * @Assert\Type(type="float", groups={"site_edit_product_dimensions"})
     */
    private $weight = 0;

    /**
     * @ORM\Column(name="length", type="decimal", precision=12, scale=2, nullable=true)
     * @Assert\Type(type="float", groups={"site_edit_product_dimensions"})
     */
    private $length = 0;

    /**
     * @ORM\Column(name="width", type="decimal", precision=12, scale=2, nullable=true)
     * @Assert\Type(type="float", groups={"site_edit_product_dimensions"})
     */
    private $width = 0;

    /**
     * @ORM\Column(name="height", type="decimal", precision=12, scale=2, nullable=true)
     * @Assert\Type(type="float", groups={"site_edit_product_dimensions"})
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

    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    private $images = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->routings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function isDeleted()
    {
        return $this->getDeletedAt() !== null;
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
     * @param \KAC\SiteBundle\Entity\Product\VariantToOption $options
     * @return Variant
     */
    public function addOption(\KAC\SiteBundle\Entity\Product\VariantToOption $options)
    {
        $this->options[] = $options;
        $options->setVariant($this);

        return $this;
    }

    /**
     * Remove options
     *
     * @param \KAC\SiteBundle\Entity\Product\VariantToOption $options
     */
    public function removeOption(\KAC\SiteBundle\Entity\Product\VariantToOption $options)
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

    public function setFeatures($features)
    {
        foreach($features as $feature)
        {
            $this->addFeature($feature);
        }
    }

    /**
     * Add features
     *
     * @param \KAC\SiteBundle\Entity\Product\VariantToFeature $features
     * @return Variant
     */
    public function addFeature(\KAC\SiteBundle\Entity\Product\VariantToFeature $features)
    {
        $this->features[] = $features;
        $features->setVariant($this);

        return $this;
    }

    /**
     * Remove features
     *
     * @param \KAC\SiteBundle\Entity\Product\VariantToFeature $features
     */
    public function removeFeature(\KAC\SiteBundle\Entity\Product\VariantToFeature $features)
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
     * @param \KAC\SiteBundle\Entity\Product\Price $prices
     * @return Variant
     */
    public function addPrice(\KAC\SiteBundle\Entity\Product\Price $prices)
    {
        $this->prices[] = $prices;
        $prices->setVariant($this);

        return $this;
    }

    /**
     * Remove prices
     *
     * @param \KAC\SiteBundle\Entity\Product\Price $prices
     */
    public function removePrice(\KAC\SiteBundle\Entity\Product\Price $prices)
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
     * @param \KAC\SiteBundle\Entity\Product $product
     * @return Variant
     */
    public function setProduct(\KAC\SiteBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \KAC\SiteBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add descriptions
     *
     * @param \KAC\SiteBundle\Entity\Product\Variant\Description $descriptions
     * @return Variant
     */
    public function addDescription(\KAC\SiteBundle\Entity\Product\Variant\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
        $descriptions->setVariant($this);
    
        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \KAC\SiteBundle\Entity\Product\Variant\Description $descriptions
     */
    public function removeDescription(\KAC\SiteBundle\Entity\Product\Variant\Description $descriptions)
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

    /**
     * Get description
     *
     * @return Variant\Description
     */
    public function getDescription()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions[0];
        }

        return null;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * Add routings
     *
     * @param \KAC\SiteBundle\Entity\Product\Variant\Routing $routings
     * @return Variant
     */
    public function addRouting(\KAC\SiteBundle\Entity\Product\Variant\Routing $routings)
    {
        $this->routings[] = $routings;
    
        return $this;
    }

    /**
     * Remove routings
     *
     * @param \KAC\SiteBundle\Entity\Product\Variant\Routing $routings
     */
    public function removeRouting(\KAC\SiteBundle\Entity\Product\Variant\Routing $routings)
    {
        $this->routings->removeElement($routings);
    }

    /**
     * Get routings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoutings()
    {
        return $this->routings;
    }
}