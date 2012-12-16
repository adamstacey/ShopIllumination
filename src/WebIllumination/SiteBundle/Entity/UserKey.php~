<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_keys")
 * @ORM\HasLifecycleCallbacks()
 */
class UserKey
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="user_id", type="integer", length=11)
     */
    private $userId;
	
	/**
     * @ORM\Column(name="user_key", type="string", length=50)
     */
    private $userKey;
                
    /**
     * @ORM\Column(name="expiry", type="datetime")
     */
    private $expiry;

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
		$expiry = date("Y-m-d H:i:s", strtotime('+1 day'));
	    $this->expiry = new \DateTime($expiry);
	}
	
	/**
	 * @ORM\PreUpdate
	 */
    public function update()
    {
    	$expiry = date("Y-m-d H:i:s", strtotime('+1 day'));
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
     * Set userId
     *
     * @param integer $userId
     * @return UserKey
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userKey
     *
     * @param string $userKey
     * @return UserKey
     */
    public function setUserKey($userKey)
    {
        $this->userKey = $userKey;
    
        return $this;
    }

    /**
     * Get userKey
     *
     * @return string 
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * Set expiry
     *
     * @param \DateTime $expiry
     * @return UserKey
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
    
        return $this;
    }

    /**
     * Get expiry
     *
     * @return \DateTime 
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return UserKey
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
     * @return UserKey
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
}