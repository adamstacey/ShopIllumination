<?php
namespace WebIllumination\SiteBundle\Entity\Contact;

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
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Contact", inversedBy="emails")
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Contact\EmailAddressType")
     * @ORM\JoinColumn(name="contact_email_address_type_id", referencedColumnName="id")
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
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
}