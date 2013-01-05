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
     * @ORM\Column(name="contact_id", type="integer", length=11)
     */
    /**
     * @ORM\OneToOne(targetEntity="WebIllumination\SiteBundle\Entity\Contact", mappedBy="user", cascade={"persist", "remove"})
     **/
    private $contact;

    public function __construct()
    {
        parent::__construct();
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
     * Set contact
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact $contact
     * @return User
     */
    public function setContact(\WebIllumination\SiteBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;
        $contact->setUser($this);
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return \WebIllumination\SiteBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }
}