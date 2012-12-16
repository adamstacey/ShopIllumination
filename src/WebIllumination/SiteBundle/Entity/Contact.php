<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contacts")
 * @ORM\HasLifecycleCallbacks()
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="object_id", type="integer", length=11)
     */
    private $objectId;
    
     /**
     * @ORM\Column(name="object_type", type="string", length=100)
     */
    private $objectType;
    
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
     * @ORM\JoinColumn(name="contact_title_id", referencedColumnName="id")
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
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Contact\Address", mappedBy="contact")
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Contact\EmailAddress", mappedBy="contact")
     */
    private $emails;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Contact\Number", mappedBy="contact")
     */
    private $numbers;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Contact\WebAddress", mappedBy="contact")
     */
    private $webAddresses;

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