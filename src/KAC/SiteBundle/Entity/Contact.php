<?php
namespace KAC\SiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use KAC\UserBundle\Entity\User;

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
     * @ORM\ManyToOne(targetEntity="KAC\UserBundle\Entity\User", inversedBy="contacts")
     */
    private $user;

    /**
     * @ORM\Column(name="organisation_name", type="string", length=255)
     */
    private $organisationName;

    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Contact\Address", mappedBy="contact")
     */
    private $addresses;

    /**
     * @ORM\OneToOne(targetEntity="KAC\SiteBundle\Entity\Contact\Number", mappedBy="contact")
     */
    private $telephoneDaytime;

    /**
     * @ORM\OneToOne(targetEntity="KAC\SiteBundle\Entity\Contact\Number", mappedBy="contact")
     */
    private $telephoneEvening;

    /**
     * @ORM\OneToOne(targetEntity="KAC\SiteBundle\Entity\Contact\Number", mappedBy="contact")
     */
    private $telephoneMobile;

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
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addresses = new ArrayCollection();
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Contact
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Contact
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add addresses
     *
     * @param Contact\Address $addresses
     * @return Contact
     */
    public function addAddress(Contact\Address $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param Contact\Address $addresses
     */
    public function removeAddress(Contact\Address $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return Contact\Address[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Set telephoneDaytime
     *
     * @param Contact\Number $telephoneDaytime
     * @return Contact
     */
    public function setTelephoneDaytime(Contact\Number $telephoneDaytime = null)
    {
        $this->telephoneDaytime = $telephoneDaytime;

        return $this;
    }

    /**
     * Get telephoneDaytime
     *
     * @return Contact\Number
     */
    public function getTelephoneDaytime()
    {
        return $this->telephoneDaytime;
    }

    /**
     * Set telephoneEvening
     *
     * @param Contact\Number $telephoneEvening
     * @return Contact
     */
    public function setTelephoneEvening(Contact\Number $telephoneEvening = null)
    {
        $this->telephoneEvening = $telephoneEvening;

        return $this;
    }

    /**
     * Get telephoneEvening
     *
     * @return Contact\Number
     */
    public function getTelephoneEvening()
    {
        return $this->telephoneEvening;
    }

    /**
     * Set telephoneMobile
     *
     * @param Contact\Number $telephoneMobile
     * @return Contact
     */
    public function setTelephoneMobile(Contact\Number $telephoneMobile = null)
    {
        $this->telephoneMobile = $telephoneMobile;

        return $this;
    }

    /**
     * Get telephoneMobile
     *
     * @return Contact\Number
     */
    public function getTelephoneMobile()
    {
        return $this->telephoneMobile;
    }
}