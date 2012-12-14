<?php
namespace WebIllumination\AdminBundle\Entity;

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
     * @OneToMany(targetEntity="WebIlluminationAdminBundle:Brand/Description", mappedBy="description")
     **/
    private $descriptions;
	
	/**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;
	            
    /**
     * @ORM\Column(name="request_a_brochure", type="integer", length=1)
     */
    private $requestABrochure;
    
    /**
     * @ORM\Column(name="brochure_web_address", type="string", length=255)
     */
    private $brochureWebAddress;
    
     /**
     * @ORM\Column(name="request_a_sample", type="integer", length=1)
     */
    private $requestASample;
    
    /**
     * @ORM\Column(name="sample_web_address", type="string", length=255)
     */
    private $sampleWebAddress;
    
    /**
     * @ORM\Column(name="hide_prices", type="integer", length=1)
     */
    private $hidePrices;
    
    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="integer", length=1)
     */
    private $showPricesOutOfHours;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="integer", length=1)
     */
    private $membershipCardDiscountAvailable;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4)
     */
    private $maximumMembershipCardDiscount;
        
    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
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