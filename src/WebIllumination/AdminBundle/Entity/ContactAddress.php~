<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact_address")
 * @ORM\HasLifecycleCallbacks()
 */
class ContactAddress
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="contact_address_type_id", type="integer", length="11")
     */
    private $contactAddressTypeId;
    
    /**
     * @ORM\Column(name="contact_id", type="integer", length="11")
     */
    private $contactId;
        
    /**
     * @ORM\Column(name="display_order", type="integer", length="11")
     */
    private $displayOrder;
    
    /**
     * @ORM\Column(name="display_name", type="string", length="255")
     */
    private $displayName;
    
    /**
     * @ORM\Column(name="organisation_name", type="string", length="255")
     */
    private $organisationName;
    
    /**
     * @ORM\Column(name="contact_title_id", type="integer", length="11")
     */
    private $contactTitleId;
    
    /**
     * @ORM\Column(name="first_name", type="string", length="255")
     */
    private $firstName;
    
    /**
     * @ORM\Column(name="middle_name", type="string", length="255")
     */
    private $middleName;
    
    /**
     * @ORM\Column(name="last_name", type="string", length="255")
     */
    private $lastName;
    
    /**
     * @ORM\Column(name="address_line_1", type="string", length="255")
     */
    private $addressLine1;
    
    /**
     * @ORM\Column(name="address_line_2", type="string", length="255")
     */
    private $addressLine2;
    
    /**
     * @ORM\Column(name="address_line_3", type="string", length="255")
     */
    private $addressLine3;
    
    /**
     * @ORM\Column(name="town_city", type="string", length="100")
     */
    private $townCity;
    
    /**
     * @ORM\Column(name="county_state", type="string", length="100")
     */
    private $countyState;
    
    /**
     * @ORM\Column(name="post_zip_code", type="string", length="20")
     */
    private $postZipCode;
    
     /**
     * @ORM\Column(name="country_code", type="string", length="2")
     */
    private $countryCode;
        
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

	/**
	 * @ORM\prePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\preUpdate
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
     * Set contactAddressTypeId
     *
     * @param integer $contactAddressTypeId
     */
    public function setContactAddressTypeId($contactAddressTypeId)
    {
        $this->contactAddressTypeId = $contactAddressTypeId;
    }

    /**
     * Get contactAddressTypeId
     *
     * @return integer 
     */
    public function getContactAddressTypeId()
    {
        return $this->contactAddressTypeId;
    }

    /**
     * Set contactId
     *
     * @param integer $contactId
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    /**
     * Get contactId
     *
     * @return integer 
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
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
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
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
     */
    public function setOrganisationName($organisationName)
    {
        $this->organisationName = $organisationName;
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
     * Set contactTitleId
     *
     * @param integer $contactTitleId
     */
    public function setContactTitleId($contactTitleId)
    {
        $this->contactTitleId = $contactTitleId;
    }

    /**
     * Get contactTitleId
     *
     * @return integer 
     */
    public function getContactTitleId()
    {
        return $this->contactTitleId;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
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
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
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
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
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
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
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
     */
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = $addressLine3;
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
     */
    public function setTownCity($townCity)
    {
        $this->townCity = $townCity;
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
     */
    public function setCountyState($countyState)
    {
        $this->countyState = $countyState;
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
     */
    public function setPostZipCode($postZipCode)
    {
        $this->postZipCode = $postZipCode;
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
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
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
}