<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brand")
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
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

	/**
	 * @ORM\PrePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\PreUpdate
	 */
    public function update()
    {
        $this->updatedAt = new \DateTime();
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
     */
    public function setStatus($status)
    {
        $this->status = $status;
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

    /**
     * Set requestABrochure
     *
     * @param integer $requestABrochure
     */
    public function setRequestABrochure($requestABrochure)
    {
        $this->requestABrochure = $requestABrochure;
    }

    /**
     * Get requestABrochure
     *
     * @return integer 
     */
    public function getRequestABrochure()
    {
        return $this->requestABrochure;
    }

    /**
     * Set brochureWebAddress
     *
     * @param string $brochureWebAddress
     */
    public function setBrochureWebAddress($brochureWebAddress)
    {
        $this->brochureWebAddress = $brochureWebAddress;
    }

    /**
     * Get brochureWebAddress
     *
     * @return string 
     */
    public function getBrochureWebAddress()
    {
        return $this->brochureWebAddress;
    }

    /**
     * Set requestASample
     *
     * @param integer $requestASample
     */
    public function setRequestASample($requestASample)
    {
        $this->requestASample = $requestASample;
    }

    /**
     * Get requestASample
     *
     * @return integer 
     */
    public function getRequestASample()
    {
        return $this->requestASample;
    }

    /**
     * Set sampleWebAddress
     *
     * @param string $sampleWebAddress
     */
    public function setSampleWebAddress($sampleWebAddress)
    {
        $this->sampleWebAddress = $sampleWebAddress;
    }

    /**
     * Get sampleWebAddress
     *
     * @return string 
     */
    public function getSampleWebAddress()
    {
        return $this->sampleWebAddress;
    }

    /**
     * Set hidePrices
     *
     * @param integer $hidePrices
     */
    public function setHidePrices($hidePrices)
    {
        $this->hidePrices = $hidePrices;
    }

    /**
     * Get hidePrices
     *
     * @return integer 
     */
    public function getHidePrices()
    {
        return $this->hidePrices;
    }

    /**
     * Set showPricesOutOfHours
     *
     * @param integer $showPricesOutOfHours
     */
    public function setShowPricesOutOfHours($showPricesOutOfHours)
    {
        $this->showPricesOutOfHours = $showPricesOutOfHours;
    }

    /**
     * Get showPricesOutOfHours
     *
     * @return integer 
     */
    public function getShowPricesOutOfHours()
    {
        return $this->showPricesOutOfHours;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set membershipCardDiscountAvailable
     *
     * @param integer $membershipCardDiscountAvailable
     */
    public function setMembershipCardDiscountAvailable($membershipCardDiscountAvailable)
    {
        $this->membershipCardDiscountAvailable = $membershipCardDiscountAvailable;
    }

    /**
     * Get membershipCardDiscountAvailable
     *
     * @return integer 
     */
    public function getMembershipCardDiscountAvailable()
    {
        return $this->membershipCardDiscountAvailable;
    }

    /**
     * Set maximumMembershipCardDiscount
     *
     * @param decimal $maximumMembershipCardDiscount
     */
    public function setMaximumMembershipCardDiscount($maximumMembershipCardDiscount)
    {
        $this->maximumMembershipCardDiscount = $maximumMembershipCardDiscount;
    }

    /**
     * Get maximumMembershipCardDiscount
     *
     * @return decimal 
     */
    public function getMaximumMembershipCardDiscount()
    {
        return $this->maximumMembershipCardDiscount;
    }
}