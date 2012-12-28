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
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Brand\Description", mappedBy="brand", cascade={"all"})
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\BrandToDepartment", mappedBy="brand", cascade={"all"})
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Brand
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
     * Set requestABrochure
     *
     * @param boolean $requestABrochure
     * @return Brand
     */
    public function setRequestABrochure($requestABrochure)
    {
        $this->requestABrochure = $requestABrochure;

        return $this;
    }

    /**
     * Get requestABrochure
     *
     * @return boolean
     */
    public function getRequestABrochure()
    {
        return $this->requestABrochure;
    }

    /**
     * Set brochureWebAddress
     *
     * @param string $brochureWebAddress
     * @return Brand
     */
    public function setBrochureWebAddress($brochureWebAddress)
    {
        $this->brochureWebAddress = $brochureWebAddress;

        return $this;
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
     * @param boolean $requestASample
     * @return Brand
     */
    public function setRequestASample($requestASample)
    {
        $this->requestASample = $requestASample;

        return $this;
    }

    /**
     * Get requestASample
     *
     * @return boolean
     */
    public function getRequestASample()
    {
        return $this->requestASample;
    }

    /**
     * Set sampleWebAddress
     *
     * @param string $sampleWebAddress
     * @return Brand
     */
    public function setSampleWebAddress($sampleWebAddress)
    {
        $this->sampleWebAddress = $sampleWebAddress;

        return $this;
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
     * @param boolean $hidePrices
     * @return Brand
     */
    public function setHidePrices($hidePrices)
    {
        $this->hidePrices = $hidePrices;

        return $this;
    }

    /**
     * Get hidePrices
     *
     * @return boolean
     */
    public function getHidePrices()
    {
        return $this->hidePrices;
    }

    /**
     * Set showPricesOutOfHours
     *
     * @param boolean $showPricesOutOfHours
     * @return Brand
     */
    public function setShowPricesOutOfHours($showPricesOutOfHours)
    {
        $this->showPricesOutOfHours = $showPricesOutOfHours;

        return $this;
    }

    /**
     * Get showPricesOutOfHours
     *
     * @return boolean
     */
    public function getShowPricesOutOfHours()
    {
        return $this->showPricesOutOfHours;
    }

    /**
     * Set membershipCardDiscountAvailable
     *
     * @param boolean $membershipCardDiscountAvailable
     * @return Brand
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
     * @return Brand
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Brand
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
     * @return Brand
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
     * Add departments
     *
     * @param \WebIllumination\SiteBundle\Entity\BrandToDepartment $departments
     * @return Brand
     */
    public function addDepartment(\WebIllumination\SiteBundle\Entity\BrandToDepartment $departments)
    {
        $this->departments[] = $departments;

        return $this;
    }

    /**
     * Remove departments
     *
     * @param \WebIllumination\SiteBundle\Entity\BrandToDepartment $departments
     */
    public function removeDepartment(\WebIllumination\SiteBundle\Entity\BrandToDepartment $departments)
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
     * Add descriptions
     *
     * @param \WebIllumination\SiteBundle\Entity\Brand\Description $descriptions
     * @return Brand
     */
    public function addDescription(\WebIllumination\SiteBundle\Entity\Brand\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
    
        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \WebIllumination\SiteBundle\Entity\Brand\Description $descriptions
     */
    public function removeDescription(\WebIllumination\SiteBundle\Entity\Brand\Description $descriptions)
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