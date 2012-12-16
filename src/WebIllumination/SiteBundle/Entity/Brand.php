<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brands")
 * @ORM\HasLifecycleCallbacks()
 */
class Brand
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Brand\Description", mappedBy="brand")
     **/
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\BrandToDepartment", mappedBy="department")
     **/
    private $departments;
	
	/**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status = 'a';
	            
    /**
     * @ORM\Column(name="request_a_brochure", type="boolean")
     */
    private $requestABrochure = false;
    
    /**
     * @ORM\Column(name="brochure_web_address", type="string", length=255)
     */
    private $brochureWebAddress;
    
     /**
     * @ORM\Column(name="request_a_sample", type="boolean")
     */
    private $requestASample = false;
    
    /**
     * @ORM\Column(name="sample_web_address", type="string", length=255)
     */
    private $sampleWebAddress;
    
    /**
     * @ORM\Column(name="hide_prices", type="boolean")
     */
    private $hidePrices = false;
    
    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="boolean")
     */
    private $showPricesOutOfHours = false;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="boolean")
     */
    private $membershipCardDiscountAvailable = true;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4)
     */
    private $maximumMembershipCardDiscount = 0.0000;

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
    		
    		case 'a':
    			return 'green';
    			break;
    		case 'h':
    			return 'amber';
    			break;
    		case 'd':
    			return 'red';
    			break;
    	}
        return '';
    }
}