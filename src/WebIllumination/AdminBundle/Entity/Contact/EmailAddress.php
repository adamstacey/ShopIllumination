<?php
namespace WebIllumination\AdminBundle\Entity\Contact;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact_email_addresses")
 * @ORM\HasLifecycleCallbacks()
 */
class EmailAddress
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="WebIlluminationAdminBundle:Contact", inversedBy="emails")
     */
    private $contact;

    /**
     * @ManyToOne(targetEntity="WebIlluminationAdminBundle:Contact/DetailType")
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

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
}