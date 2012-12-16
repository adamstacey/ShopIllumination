<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="contact_id", type="integer", length=11)
     */
    private $contactId;
	
	/**
     * @ORM\Column(name="email_address", type="string", length=255, unique=true)
     */
    private $emailAddress;
    
    /**
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;
    
    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
            
    /**
     * @ORM\Column(name="last_logged_in", type="datetime")
     */
    private $lastLoggedIn;

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
	 * @ORM\PrePersist
	 */
	public function create()
	{
		$this->lastLoggedIn = new \DateTime();
	}
    
    public function __construct()
    {
        $this->active = 1;
        $this->lastLoggedIn = new \DateTime();
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function equals(UserInterface $user)
    {
        return $user->getUsername() === $this->emailAddress;
    }

    public function eraseCredentials()
    {
    }

    public function getUsername()
    {
        return $this->emailAddress;
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
     * Set contactId
     *
     * @param integer $contactId
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    /**
     * Get contactId
     *
     * @return integer
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
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
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set active
     *
     * @param integer $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set lastLoggedIn
     *
     * @param datetime $lastLoggedIn
     */
    public function setLastLoggedIn($lastLoggedIn)
    {
        $this->lastLoggedIn = $lastLoggedIn;
    }

    /**
     * Get lastLoggedIn
     *
     * @return datetime
     */
    public function getLastLoggedIn()
    {
        return $this->lastLoggedIn;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}