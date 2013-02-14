<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 * @ORM\HasLifecycleCallbacks()

 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Brand")
     * @Assert\NotBlank(groups={"flow_site_new_product_step1", "site_edit_product_overview"}, message="Select a brand.")
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Description", mappedBy="product", cascade={"persist", "remove"})
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\ProductToDepartment", mappedBy="product", cascade={"persist", "remove"})
     * @Assert\NotBlank(groups={"flow_site_new_product_step1", "site_edit_product_overview"}, message="Select a department.")
     */
    private $departments;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Link", mappedBy="product", cascade={"persist", "remove"})
     */
    private $links;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Variant", mappedBy="product", cascade={"persist", "remove"})
     */
    private $variants;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     * @Assert\NotBlank(groups={"flow_site_new_product_step1", "site_edit_product_overview"}, message="Select a status.")
     * @Assert\Choice(choices={"a", "h", "d"})
     */
    private $status = 'd';

    /**
     * @ORM\Column(name="product_code", type="string", length=100, nullable=true)
     */
    private $productCode = '';

    /**
     * @ORM\Column(name="alternative_product_codes", type="text", nullable=true)
     */
    private $alternativeProductCodes = '';

    /**
     * @ORM\Column(name="checked", type="boolean")
     */
    private $checked = false;

    /**
     * @ORM\Column(name="available_for_purchase", type="boolean")
     *
     */
    private $availableForPurchase = false;

    /**
     * @ORM\Column(name="feature_comparison", type="boolean")
     *
     */
    private $featureComparison = false;

    /**
     * @ORM\Column(name="downloadable", type="boolean")
     *
     */
    private $downloadable = false;

    /**
     * @ORM\Column(name="special_offer", type="boolean")
     *
     */
    private $specialOffer = false;

    /**
     * @ORM\Column(name="recommended", type="boolean")
     *
     */
    private $recommended = false;

    /**
     * @ORM\Column(name="accessory", type="boolean")
     *
     */
    private $accessory = false;

    /**
     * @ORM\Column(name="new", type="boolean")
     *
     */
    private $new = false;

    /**
     * @ORM\Column(name="sample_request", type="boolean")
     *
     */
    private $sampleRequest = false;

    /**
     * @ORM\Column(name="hide_price", type="boolean")
     *
     */
    private $hidePrice = false;

    /**
     * @ORM\Column(name="show_price_out_of_hours", type="boolean")
     *
     */
    private $showPriceOutOfHours = false;

    /**
     * @ORM\Column(name="membership_card_discount_available", type="boolean")
     *
     */
    private $membershipCardDiscountAvailable = false;

    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4, nullable=true)
     */
    private $maximumMembershipCardDiscount = 0;

    /**
     * @ORM\Column(name="delivery_band", type="decimal", precision=12, scale=4)
     */
    private $deliveryBand = 1;

    /**
     * @ORM\Column(name="inherited_delivery_band", type="decimal", precision=12, scale=4, nullable=true)
     */
    private $inheritedDeliveryBand = null;

    /**
     * @ORM\Column(name="delivery_cost", type="decimal", precision=12, scale=4)
     */
    private $deliveryCost = 0;

    /**
     * @ORM\Column(name="last_checked", type="datetime", nullable=true)
     */
    private $lastChecked;

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

    private $features = array();
    private $prices = array();

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
     * Constructor
     */
    public function __construct()
    {
        $this->variants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->links = new \Doctrine\Common\Collections\ArrayCollection();
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions[0]->getName();
        } else {
            return "";
        }
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
     * @return Product
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
     * Set checked
     *
     * @param boolean $checked
     * @return Product
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;

        return $this;
    }

    /**
     * Get checked
     *
     * @return boolean
     */
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * Set availableForPurchase
     *
     * @param boolean $availableForPurchase
     * @return Product
     */
    public function setAvailableForPurchase($availableForPurchase)
    {
        $this->availableForPurchase = $availableForPurchase;

        return $this;
    }

    /**
     * Get availableForPurchase
     *
     * @return boolean
     */
    public function getAvailableForPurchase()
    {
        return $this->availableForPurchase;
    }

    /**
     * Set featureComparison
     *
     * @param boolean $featureComparison
     * @return Product
     */
    public function setFeatureComparison($featureComparison)
    {
        $this->featureComparison = $featureComparison;

        return $this;
    }

    /**
     * Get featureComparison
     *
     * @return boolean
     */
    public function getFeatureComparison()
    {
        return $this->featureComparison;
    }

    /**
     * Set downloadable
     *
     * @param boolean $downloadable
     * @return Product
     */
    public function setDownloadable($downloadable)
    {
        $this->downloadable = $downloadable;

        return $this;
    }

    /**
     * Get downloadable
     *
     * @return boolean
     */
    public function getDownloadable()
    {
        return $this->downloadable;
    }

    /**
     * Set specialOffer
     *
     * @param boolean $specialOffer
     * @return Product
     */
    public function setSpecialOffer($specialOffer)
    {
        $this->specialOffer = $specialOffer;

        return $this;
    }

    /**
     * Get specialOffer
     *
     * @return boolean
     */
    public function getSpecialOffer()
    {
        return $this->specialOffer;
    }

    /**
     * Set recommended
     *
     * @param boolean $recommended
     * @return Product
     */
    public function setRecommended($recommended)
    {
        $this->recommended = $recommended;

        return $this;
    }

    /**
     * Get recommended
     *
     * @return boolean
     */
    public function getRecommended()
    {
        return $this->recommended;
    }

    /**
     * Set accessory
     *
     * @param boolean $accessory
     * @return Product
     */
    public function setAccessory($accessory)
    {
        $this->accessory = $accessory;

        return $this;
    }

    /**
     * Get accessory
     *
     * @return boolean
     */
    public function getAccessory()
    {
        return $this->accessory;
    }

    /**
     * Set new
     *
     * @param boolean $new
     * @return Product
     */
    public function setNew($new)
    {
        $this->new = $new;

        return $this;
    }

    /**
     * Get new
     *
     * @return boolean
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Set sampleRequest
     *
     * @param boolean $sampleRequest
     * @return Product
     */
    public function setSampleRequest($sampleRequest)
    {
        $this->sampleRequest = $sampleRequest;

        return $this;
    }

    /**
     * Get sampleRequest
     *
     * @return boolean
     */
    public function getSampleRequest()
    {
        return $this->sampleRequest;
    }

    /**
     * Set hidePrice
     *
     * @param boolean $hidePrice
     * @return Product
     */
    public function setHidePrice($hidePrice)
    {
        $this->hidePrice = $hidePrice;

        return $this;
    }

    /**
     * Get hidePrice
     *
     * @return boolean
     */
    public function getHidePrice()
    {
        return $this->hidePrice;
    }

    /**
     * Set showPriceOutOfHours
     *
     * @param boolean $showPriceOutOfHours
     * @return Product
     */
    public function setShowPriceOutOfHours($showPriceOutOfHours)
    {
        $this->showPriceOutOfHours = $showPriceOutOfHours;

        return $this;
    }

    /**
     * Get showPriceOutOfHours
     *
     * @return boolean
     */
    public function getShowPriceOutOfHours()
    {
        return $this->showPriceOutOfHours;
    }

    /**
     * Set membershipCardDiscountAvailable
     *
     * @param boolean $membershipCardDiscountAvailable
     * @return Product
     */
    public function setMembershipCardDiscountAvailable($membershipCardDiscountAvailable)
    {
        $this->membershipCardDiscountAvailable = $membershipCardDiscountAvailable;

        return $this;
    }

    /**
     * Get membershipCardDiscountAvailable
     *
     * @return boolean
     */
    public function getMembershipCardDiscountAvailable()
    {
        return $this->membershipCardDiscountAvailable;
    }

    /**
     * Set maximumMembershipCardDiscount
     *
     * @param float $maximumMembershipCardDiscount
     * @return Product
     */
    public function setMaximumMembershipCardDiscount($maximumMembershipCardDiscount)
    {
        $this->maximumMembershipCardDiscount = $maximumMembershipCardDiscount;

        return $this;
    }

    /**
     * Get maximumMembershipCardDiscount
     *
     * @return float
     */
    public function getMaximumMembershipCardDiscount()
    {
        return $this->maximumMembershipCardDiscount;
    }

    /**
     * Set deliveryBand
     *
     * @param float $deliveryBand
     * @return Product
     */
    public function setDeliveryBand($deliveryBand)
    {
        $this->deliveryBand = $deliveryBand;

        return $this;
    }

    /**
     * Get deliveryBand
     *
     * @return float
     */
    public function getDeliveryBand()
    {
        return $this->deliveryBand;
    }

    /**
     * Set inheritedDeliveryBand
     *
     * @param float $inheritedDeliveryBand
     * @return Product
     */
    public function setInheritedDeliveryBand($inheritedDeliveryBand)
    {
        $this->inheritedDeliveryBand = $inheritedDeliveryBand;

        return $this;
    }

    /**
     * Get inheritedDeliveryBand
     *
     * @return float
     */
    public function getInheritedDeliveryBand()
    {
        return $this->inheritedDeliveryBand;
    }

    /**
     * Set deliveryCost
     *
     * @param float $deliveryCost
     * @return Product
     */
    public function setDeliveryCost($deliveryCost)
    {
        $this->deliveryCost = $deliveryCost;

        return $this;
    }

    /**
     * Get deliveryCost
     *
     * @return float
     */
    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }

    /**
     * Set lastChecked
     *
     * @param \DateTime $lastChecked
     * @return Product
     */
    public function setLastChecked($lastChecked)
    {
        $this->lastChecked = $lastChecked;

        return $this;
    }

    /**
     * Get lastChecked
     *
     * @return \DateTime
     */
    public function getLastChecked()
    {
        return $this->lastChecked;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
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
     * @return Product
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
     * Set brand
     *
     * @param \WebIllumination\SiteBundle\Entity\Brand $brand
     * @return Product
     */
    public function setBrand(\WebIllumination\SiteBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \WebIllumination\SiteBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Add departments
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToDepartment $departments
     * @return Product
     */
    public function addDepartment(\WebIllumination\SiteBundle\Entity\ProductToDepartment $departments)
    {
        $this->departments[] = $departments;
        $departments->setProduct($this);

        return $this;
    }

    /**
     * Remove departments
     *
     * @param \WebIllumination\SiteBundle\Entity\ProductToDepartment $departments
     */
    public function removeDepartment(\WebIllumination\SiteBundle\Entity\ProductToDepartment $departments)
    {
        $this->departments->removeElement($departments);
    }

    /**
     * Get departments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Get description
     *
     * @return \WebIllumination\SiteBundle\Entity\ProductToDepartment
     */
    public function getDepartment()
    {
        if(count($this->departments) > 0)
        {
            return $this->departments[0];
        }

        return null;
    }

    /**
     * Add links
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Link $links
     * @return Product
     */
    public function addLink(\WebIllumination\SiteBundle\Entity\Product\Link $links)
    {
        $this->links[] = $links;
        $links->setProduct($this);


        return $this;
    }

    /**
     * Remove links
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Link $links
     */
    public function removeLink(\WebIllumination\SiteBundle\Entity\Product\Link $links)
    {
        $this->links->removeElement($links);
    }

    /**
     * Get links
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Add variants
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Variant $variants
     * @return Product
     */
    public function addVariant(\WebIllumination\SiteBundle\Entity\Product\Variant $variants)
    {
        $this->variants[] = $variants;
        $variants->setProduct($this);

        return $this;
    }

    /**
     * Remove variants
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Variant $variants
     */
    public function removeVariant(\WebIllumination\SiteBundle\Entity\Product\Variant $variants)
    {
        $this->variants->removeElement($variants);
    }

    /**
     * Get variants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * Add descriptions
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Description $descriptions
     * @return Product
     */
    public function addDescription(\WebIllumination\SiteBundle\Entity\Product\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
        $descriptions->setProduct($this);

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

    /**
     * Get description
     *
     * @return Product\Description
     */
    public function getDescription()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions[0];
        }

        return null;
    }

    public function getProductCode()
    {
        return $this->productCode;
    }

    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    public function getFeatures()
    {
        return $this->features;
    }

    public function setFeatures($featureGroups)
    {
        $this->features = $featureGroups;
    }

    public function addFeatureGroup(ProductToFeature $featureGroup)
    {
        $this->features[] = $featureGroup;
    }

    public function removeFeatureGroup($featureGroup)
    {
        $key = array_search($featureGroup, $this->features);
        if($key)
        {
            unset($this->features[$key]);
        }
    }

    public function getPrices()
    {
        return $this->prices;
    }

    public function setPrices($prices)
    {
        $this->prices = $prices;
    }

    public function addPrice($price)
    {
        $this->prices[] = $price;
    }

    public function removePrice($price)
    {
        $key = array_search($price, $this->prices);
        if($key)
        {
            unset($this->prices[$key]);
        }
    }

    public function getAlternativeProductCodes()
    {
        return $this->alternativeProductCodes;
    }

    public function setAlternativeProductCodes($alternativeProductCodes)
    {
        $this->alternativeProductCodes = $alternativeProductCodes;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }
}