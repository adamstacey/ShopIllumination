<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="messages")
 * @ORM\HasLifecycleCallbacks()
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="message_type", type="string", length=100)
     */
    private $messageType;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\Column(name="email_address", type="string", length=255)
     */
    private $emailAddress;
    
    /**
     * @ORM\Column(name="contact_number", type="string", length=255)
     */
    private $contactNumber;
	
	/**
     * @ORM\Column(name="message", type="text")
     */
    private $message;
    
    /**
     * @ORM\Column(name="printed", type="boolean")
     */
    private $printed;
    
    /**
     * @ORM\Column(name="viewed", type="boolean")
     */
    private $viewed;
    
    /**
     * @ORM\Column(name="actioned", type="boolean")
     */
    private $actioned;

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
     * Set messageType
     *
     * @param string $messageType
     * @return Message
     */
    public function setMessageType($messageType)
    {
        $this->messageType = $messageType;
    
        return $this;
    }

    /**
     * Get messageType
     *
     * @return string 
     */
    public function getMessageType()
    {
        return $this->messageType;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Message
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return Message
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    
        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set contactNumber
     *
     * @param string $contactNumber
     * @return Message
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;
    
        return $this;
    }

    /**
     * Get contactNumber
     *
     * @return string 
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set printed
     *
     * @param boolean $printed
     * @return Message
     */
    public function setPrinted($printed)
    {
        $this->printed = $printed;
    
        return $this;
    }

    /**
     * Get printed
     *
     * @return boolean 
     */
    public function getPrinted()
    {
        return $this->printed;
    }

    /**
     * Set viewed
     *
     * @param boolean $viewed
     * @return Message
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;
    
        return $this;
    }

    /**
     * Get viewed
     *
     * @return boolean 
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * Set actioned
     *
     * @param boolean $actioned
     * @return Message
     */
    public function setActioned($actioned)
    {
        $this->actioned = $actioned;
    
        return $this;
    }

    /**
     * Get actioned
     *
     * @return boolean 
     */
    public function getActioned()
    {
        return $this->actioned;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Message
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
     * @return Message
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
}