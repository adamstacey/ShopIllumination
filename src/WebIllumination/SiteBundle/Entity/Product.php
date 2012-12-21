<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

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
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Description", mappedBy="product")
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\ProductToDepartment", mappedBy="product", cascade={"all"})
     */
    private $departments;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Link", mappedBy="product", cascade={"all"})
     */
    private $links;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Variant", mappedBy="product", cascade={"all"})
     */
    private $variants;

    /**
     * @ORM\Column(name="price", type="decimal", precision=12, scale=4)
     */
    private $price;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;
    
    /**
     * @ORM\Column(name="checked", type="boolean")
     */
    private $checked;
    
    /**
     * @ORM\Column(name="available_for_purchase", type="boolean")
     */
    private $availableForPurchase;
    
    /**
     * @ORM\Column(name="feature_comparison", type="boolean")
     */
    private $featureComparison;
    
    /**
     * @ORM\Column(name="downloadable", type="boolean")
     */
    private $downloadable;
    
    /**
     * @ORM\Column(name="special_offer", type="boolean")
     */
    private $specialOffer;
    
    /**
     * @ORM\Column(name="recommended", type="boolean")
     */
    private $recommended;
    
    /**
     * @ORM\Column(name="accessory", type="boolean")
     */
    private $accessory;
    
    /**
     * @ORM\Column(name="new", type="boolean")
     */
    private $new;

    /**
     * @ORM\Column(name="sample_request", type="boolean")
     */
    private $sampleRequest;

    /**
     * @ORM\Column(name="hide_price", type="boolean")
     */
    private $hidePrice;

    /**
     * @ORM\Column(name="show_price_out_of_hours", type="boolean")
     */
    private $showPriceOutOfHours;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="boolean")
     */
    private $membershipCardDiscountAvailable;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4)
     */
    private $maximumMembershipCardDiscount;
    
    /**
     * @ORM\Column(name="delivery_band", type="decimal", precision=12, scale=4)
     */
    private $deliveryBand;
    
    /**
     * @ORM\Column(name="inherited_delivery_band", type="decimal", precision=12, scale=4)
     */
    private $inheritedDeliveryBand;
    
    /**
     * @ORM\Column(name="delivery_cost", type="decimal", precision=12, scale=4)
     */
    private $deliveryCost;
        
    /**
     * @ORM\Column(name="last_checked", type="datetime")
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
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->links = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add links
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Link $links
     * @return Product
     */
    public function addLink(\WebIllumination\SiteBundle\Entity\Product\Link $links)
    {
        $this->links[] = $links;
    
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

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
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
}