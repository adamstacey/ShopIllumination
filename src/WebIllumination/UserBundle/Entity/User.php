<?php
namespace WebIllumination\UserBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Contact", mappedBy="user", cascade={"persist", "remove"})
     */
    private $contacts;

    public function __construct()
    {
        parent::__construct();

        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Sets the email.
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->setUsername($email);

        return parent::setEmail($email);
    }

    /**
     * Set the canonical email.
     *
     * @param string $emailCanonical
     * @return User
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->setUsernameCanonical($emailCanonical);

        return parent::setEmailCanonical($emailCanonical);
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
     * Add contact
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact $contact
     * @return User
     */
    public function addContact(\WebIllumination\SiteBundle\Entity\Contact $contact)
    {
        $this->contacts[] = $contact;
        $contact->setUser($this);

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact $contact
     */
    public function removeContact(\WebIllumination\SiteBundle\Entity\Contact $contact)
    {
        $this->contacts->removeElement($contact);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set contacts
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact $contacts
     * @return User
     */
    public function setContacts(\WebIllumination\SiteBundle\Entity\Contact $contacts = null)
    {
        $this->contacts = $contacts;
    
        return $this;
    }
}