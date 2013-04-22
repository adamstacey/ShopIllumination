<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\SerializerBundle\Annotation as Serializer;
use Symfony\Component\Validator\ExecutionContext;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isFeatureSelected"}, groups={"flow_site_new_product_step5"})
 */
class Product implements DescribableInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Brand")
     * @Assert\NotBlank(groups={"flow_site_new_product_step1", "site_edit_product_overview"}, message="Select a brand.")
     * @Serializer\Exclude()
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Description", mappedBy="product", cascade={"persist", "remove"})
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\ProductToDepartment", mappedBy="product", cascade={"persist", "remove"})
     * @Assert\NotBlank(groups={"flow_site_new_product_step1", "site_edit_product_overview"}, message="Select a department.")
     * @Serializer\Exclude()
     */
    private $departments;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Link", mappedBy="product", cascade={"persist", "remove"})
     * @Serializer\Exclude()
     */
    private $links;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Variant", mappedBy="product", cascade={"persist", "remove"})
     */
    private $variants;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Routing", mappedBy="product", cascade={"all"})
     */
    private $routings;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     * @Assert\NotBlank(groups={"flow_site_new_product_step1", "site_edit_product_overview"}, message="Select a status.")
     * @Assert\Choice(choices={"a", "h", "d"}, groups={"flow_site_new_product_step1", "site_edit_product_overview"})
     */
    private $status = 'a';

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
     * @ORM\Column(name="template", type="string", length=255)
     */
    private $template = "default";

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
    private $images = "";
    private $productImages = "";

    public function isFeatureSelected(ExecutionContext $context)
    {
        // Check the validation group
        if($context->getGroup() === "flow_site_new_product_step2")
        {
            // Check that the feature and feature group fields have both been filled in
            $i = 0;
            foreach($this->features as $feature)
            {
                if($feature->getFeatureGroup() === null)
                {
                    $context->addViolationAtSubPath('features['.$i.'].featureGroup', 'You must select a feature group');
                }
                if($feature->getFeature() === null)
                {
                    $context->addViolationAtSubPath('features['.$i.'].feature', 'You must select a feature');
                }

                $i++;
            }
        }
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
        $this->routings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \KAC\SiteBundle\Entity\Brand $brand
     * @return Product
     */
    public function setBrand(\KAC\SiteBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \KAC\SiteBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Add departments
     *
     * @param \KAC\SiteBundle\Entity\ProductToDepartment $departments
     * @return Product
     */
    public function addDepartment(\KAC\SiteBundle\Entity\ProductToDepartment $departments)
    {
        $this->departments[] = $departments;
        $departments->setProduct($this);

        return $this;
    }

    /**
     * Remove departments
     *
     * @param \KAC\SiteBundle\Entity\ProductToDepartment $departments
     */
    public function removeDepartment(\KAC\SiteBundle\Entity\ProductToDepartment $departments)
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
     * @return \KAC\SiteBundle\Entity\ProductToDepartment
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
     * @param \KAC\SiteBundle\Entity\Product\Link $link
     * @return Product
     */
    public function addLink(\KAC\SiteBundle\Entity\Product\Link $link)
    {
        $link->setProduct($this);
        $this->links[] = $link;


        return $this;
    }

    /**
     * Remove links
     *
     * @param \KAC\SiteBundle\Entity\Product\Link $links
     */
    public function removeLink(\KAC\SiteBundle\Entity\Product\Link $links)
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
     * Set links
     *
     * @param \Doctrine\Common\Collections\Collection $links
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Add variants
     *
     * @param \KAC\SiteBundle\Entity\Product\Variant $variants
     * @return Product
     */
    public function addVariant(\KAC\SiteBundle\Entity\Product\Variant $variants)
    {
        $this->variants[] = $variants;
        $variants->setProduct($this);

        return $this;
    }

    /**
     * Remove variants
     *
     * @param \KAC\SiteBundle\Entity\Product\Variant $variants
     */
    public function removeVariant(\KAC\SiteBundle\Entity\Product\Variant $variants)
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
     * @param \KAC\SiteBundle\Entity\Product\Description $descriptions
     * @return Product
     */
    public function addDescription(\KAC\SiteBundle\Entity\Product\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
        $descriptions->setProduct($this);

        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \KAC\SiteBundle\Entity\Product\Description $descriptions
     */
    public function removeDescription(\KAC\SiteBundle\Entity\Product\Description $descriptions)
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

    public function addFeatureGroup(Product\VariantToFeature $featureGroup)
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

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * Set template
     *
     * @param string $template
     * @return Product
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Get routing
     *
     * @return \KAC\SiteBundle\Entity\Product\Routing
     */
    public function getRouting()
    {
        if (count($this->routings) > 0)
        {
            return $this->routings[0];
        }

        return null;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        if ($this->getRouting())
        {
            return $this->getRouting()->getUrl();
        }

        return null;
    }

    /**
     * Add routings
     *
     * @param \KAC\SiteBundle\Entity\Product\Routing $routings
     * @return Product
     */
    public function addRouting(\KAC\SiteBundle\Entity\Product\Routing $routings)
    {
        $this->routings[] = $routings;
    
        return $this;
    }

    /**
     * Remove routings
     *
     * @param \KAC\SiteBundle\Entity\Product\Routing $routings
     */
    public function removeRouting(\KAC\SiteBundle\Entity\Product\Routing $routings)
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