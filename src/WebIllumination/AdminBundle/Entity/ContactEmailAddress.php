<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact_email_address")
 * @ORM\HasLifecycleCallbacks()
 */
class ContactEmailAddress
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="contact_email_address_type_id", type="integer", length="11")
     */
    private $contactEmailAddressTypeId;
    
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
     * @ORM\Column(name="email", type="string", length="255")
     */
    private $email;
        
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
     * Set contactEmailAddressTypeId
     *
     * @param integer $contactEmailAddressTypeId
     */
    public function setContactEmailAddressTypeId($contactEmailAddressTypeId)
    {
        $this->contactEmailAddressTypeId = $contactEmailAddressTypeId;
    }

    /**
     * Get contactEmailAddressTypeId
     *
     * @return integer 
     */
    public function getContactEmailAddressTypeId()
    {
        return $this->contactEmailAddressTypeId;
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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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