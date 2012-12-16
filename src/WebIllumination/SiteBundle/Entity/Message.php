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
}