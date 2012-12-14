<?php
namespace WebIllumination\AdminBundle\Entity\Contact;

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
     * @ORM\Column(name="organisation_name", type="string", length=255)
     */
    private $organisationName;

    /**
     * @ManyToOne(targetEntity="WebIlluminationAdminBundle:Contact/Title")
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
}