<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 * @ORM\HasLifecycleCallbacks()
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="object_id", type="integer", length="11")
     */
    private $objectId;
    
     /**
     * @ORM\Column(name="object_type", type="string", length="100")
     */
    private $objectType;
    
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
     * Set objectId
     *
     * @param integer $objectId
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    }

    /**
     * Get objectId
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set objectType
     *
     * @param string $objectType
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
    }

    /**
     * Get objectType
     *
     * @return string 
     */
    public function getObjectType()
    {
        return $this->objectType;
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