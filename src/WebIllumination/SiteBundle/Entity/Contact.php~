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
     * @ORM\ManyToOne(targetEntity="WebIllumination\UserBundle\Entity\User", inversedBy="contacts")
     */
    private $user;
    
     /**
     * @ORM\Column(name="object_type", type="string", length=100)
     */
    private $objectType = 'customer';
    
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
     * @ORM\JoinColumn(name="contact_title_id", referencedColumnName="id", nullable=true)
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numbers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->webAddresses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set objectType
     *
     * @param string $objectType
     * @return Contact
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;

        return $this;
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
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Contact
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
     * @return Contact
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
     * Set contactTitle
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\Title $contactTitle
     * @return Contact
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

    /**
     * Add addresses
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\Address $addresses
     * @return Contact
     */
    public function addAddresse(\WebIllumination\SiteBundle\Entity\Contact\Address $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\Address $addresses
     */
    public function removeAddresse(\WebIllumination\SiteBundle\Entity\Contact\Address $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Add emails
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\EmailAddress $emails
     * @return Contact
     */
    public function addEmail(\WebIllumination\SiteBundle\Entity\Contact\EmailAddress $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\EmailAddress $emails
     */
    public function removeEmail(\WebIllumination\SiteBundle\Entity\Contact\EmailAddress $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add numbers
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\Number $numbers
     * @return Contact
     */
    public function addNumber(\WebIllumination\SiteBundle\Entity\Contact\Number $numbers)
    {
        $this->numbers[] = $numbers;

        return $this;
    }

    /**
     * Remove numbers
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\Number $numbers
     */
    public function removeNumber(\WebIllumination\SiteBundle\Entity\Contact\Number $numbers)
    {
        $this->numbers->removeElement($numbers);
    }

    /**
     * Get numbers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumbers()
    {
        return $this->numbers;
    }

    /**
     * Add webAddresses
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\WebAddress $webAddresses
     * @return Contact
     */
    public function addWebAddresse(\WebIllumination\SiteBundle\Entity\Contact\WebAddress $webAddresses)
    {
        $this->webAddresses[] = $webAddresses;

        return $this;
    }

    /**
     * Remove webAddresses
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact\WebAddress $webAddresses
     */
    public function removeWebAddresse(\WebIllumination\SiteBundle\Entity\Contact\WebAddress $webAddresses)
    {
        $this->webAddresses->removeElement($webAddresses);
    }

    /**
     * Get webAddresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWebAddresses()
    {
        return $this->webAddresses;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }
}