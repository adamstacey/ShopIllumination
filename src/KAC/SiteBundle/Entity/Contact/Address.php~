<?php
namespace WebIllumination\SiteBundle\Entity\Contact;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact_addresses")
 * @ORM\HasLifecycleCallbacks()
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Contact", inversedBy="addresses")
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Contact\AddressType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;
        
    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
     */
    private $displayOrder;
    
    /**
     * @ORM\Column(name="display_name", type="string", length=255)
     */
    private $displayName;
    
    /**
     * @ORM\Column(name="organisation_name", type="string", length=255)
     */
    private $organisationName;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Contact\Title")
     * @ORM\JoinColumn(name="title_id", referencedColumnName="id")
     */
    private $contactTitle;

    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;
    
    /**
     * @ORM\Column(name="middle_name", type="string", length=255)
     */
    private $middleName;
    
    /**
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;
    
    /**
     * @ORM\Column(name="address_line_1", type="string", length=255)
     */
    private $addressLine1;
    
    /**
     * @ORM\Column(name="address_line_2", type="string", length=255)
     */
    private $addressLine2;
    
    /**
     * @ORM\Column(name="address_line_3", type="string", length=255)
     */
    private $addressLine3;
    
    /**
     * @ORM\Column(name="town_city", type="string", length=100)
     */
    private $townCity;
    
    /**
     * @ORM\Column(name="county_state", type="string", length=100)
     */
    private $countyState;
    
    /**
     * @ORM\Column(name="post_zip_code", type="string", length=20)
     */
    private $postZipCode;
    
     /**
     * @ORM\Column(name="country_code", type="string", length=2)
     */
    private $countryCode;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Address
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
    
        return $this;
    }

    /**
     * Get displayOrder
     *
     * @return integer 
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     * @return Address
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    
        return $this;
    }

    /**
     * Get displayName
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set organisationName
     *
     * @param string $organisationName
     * @return Address
     */
    public function setOrganisationName($organisationName)
    {
        $this->organisationName = $organisationName;
    
        return $this;
    }

    /**
     * Get organisationName
     *
     * @return string 
     */
    public function getOrganisationName()
    {
        return $this->organisationName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Address
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return Address
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    
        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Address
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set addressLine1
     *
     * @param string $addressLine1
     * @return Address
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    
        return $this;
    }

    /**
     * Get addressLine1
     *
     * @return string 
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * Set addressLine2
     *
     * @param string $addressLine2
     * @return Address
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    
        return $this;
    }

    /**
     * Get addressLine2
     *
     * @return string 
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * Set addressLine3
     *
     * @param string $addressLine3
     * @return Address
     */
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = $addressLine3;
    
        return $this;
    }

    /**
     * Get addressLine3
     *
     * @return string 
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * Set townCity
     *
     * @param string $townCity
     * @return Address
     */
    public function setTownCity($townCity)
    {
        $this->townCity = $townCity;
    
        return $this;
    }

    /**
     * Get townCity
     *
     * @return string 
     */
    public function getTownCity()
    {
        return $this->townCity;
    }

    /**
     * Set countyState
     *
     * @param string $countyState
     * @return Address
     */
    public function setCountyState($countyState)
    {
        $this->countyState = $countyState;
    
        return $this;
    }

    /**
     * Get countyState
     *
     * @return string 
     */
    public function getCountyState()
    {
        return $this->countyState;
    }

    /**
     * Set postZipCode
     *
     * @param string $postZipCode
     * @return Address
     */
    public function setPostZipCode($postZipCode)
    {
        $this->postZipCode = $postZipCode;
    
        return $this;
    }

    /**
     * Get postZipCode
     *
     * @return string 
     */
    public function getPostZipCode()
    {
        return $this->postZipCode;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return Address
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    
        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Address
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
     * @return Address
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
     * Set contact
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact $contact
     * @return Address
     */
    public function setContact(\WebIllumination\SiteBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return \WebIllumination\SiteBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set type
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\AddressType $type
     * @return Address
     */
    public function setType(\WebIllumination\SiteBundle\Entity\Contact\AddressType $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \WebIllumination\SiteBundle\Entity\Contact\AddressType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set contactTitle
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\Title $contactTitle
     * @return Address
     */
    public function setContactTitle(\WebIllumination\SiteBundle\Entity\Contact\Title $contactTitle = null)
    {
        $this->contactTitle = $contactTitle;
    
        return $this;
    }

    /**
     * Get contactTitle
     *
     * @return \WebIllumination\SiteBundle\Entity\Contact\Title 
     */
    public function getContactTitle()
    {
        return $this->contactTitle;
    }
}