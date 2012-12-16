<?php
namespace WebIllumination\AdminBundle\Entity;

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
     * @ORM\Column(name="product_group_id", type="integer", length=11)
     */
    private $productGroupId;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\AdminBundle\Entity\Product\Description", mappedBy="product")
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\AdminBundle\Entity\ProductToOption", mappedBy="product")
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\AdminBundle\Entity\ProductToFeature", mappedBy="product")
     */
    private $features;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\AdminBundle\Entity\ProductToDepartment", mappedBy="product")
     */
    private $departments;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\AdminBundle\Entity\Product\Link", mappedBy="product")
     */
    private $links;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\AdminBundle\Entity\Product\Price", mappedBy="product")
     */
    private $prices;
    
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
     * @ORM\ManyToOne(targetEntity="WebIllumination\AdminBundle\Entity\Brand")
     */
    private $brand;
    
    /**
     * @ORM\Column(name="product_code", type="string", length=100)
     */
    private $productCode;
    
    /**
     * @ORM\Column(name="product_group_code", type="string", length=100)
     */
    private $productGroupCode;
    
    /**
     * @ORM\Column(name="alternative_product_codes", type="text")
     */
    private $alternativeProductCodes;
    
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
     * @ORM\Column(name="membership_card_discount_available", type="boolean")
     */
    private $membershipCardDiscountAvailable;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4)
     */
    private $maximumMembershipCardDiscount;
    
    /**
     * @ORM\Column(name="mpn", type="string", length=100)
     */
    private $mpn;
    
    /**
     * @ORM\Column(name="ean", type="string", length=14)
     */
    private $ean;
    
    /**
     * @ORM\Column(name="upc", type="string", length=12)
     */
    private $upc;
    
    /**
     * @ORM\Column(name="jan", type="string", length=13)
     */
    private $jan;
    
    /**
     * @ORM\Column(name="isbn", type="string", length=13)
     */
    private $isbn;
    
    /**
     * @ORM\Column(name="weight", type="decimal", precision=12, scale=2)
     */
    private $weight;
    
    /**
     * @ORM\Column(name="length", type="decimal", precision=12, scale=2)
     */
    private $length;
 	
 	/**
     * @ORM\Column(name="width", type="decimal", precision=12, scale=2)
     */
    private $width;
    
    /**
     * @ORM\Column(name="height", type="decimal", precision=12, scale=2)
     */
    private $height;   
    
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

}