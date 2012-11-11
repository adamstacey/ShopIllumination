<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="redirect")
 * @ORM\HasLifecycleCallbacks()
 */
class Redirect
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
     * @ORM\Column(name="redirect_from", type="text")
     */
    private $redirectFrom;
    
    /**
     * @ORM\Column(name="redirect_to", type="text")
     */
    private $redirectTo;
    
    /**
     * @ORM\Column(name="redirect_code", type="string", length=5)
     */
    private $redirectCode;
        
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

	/**
	 * @ORM\PrePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\PreUpdate
	 */
    public function update()
    {
        $this->updatedAt = new \DateTime();
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
     * Set objectId
     *
     * @param integer $objectId
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    }

    /**
     * Get objectId
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set objectType
     *
     * @param string $objectType
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
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
     * Set redirectFrom
     *
     * @param string $redirectFrom
     */
    public function setRedirectFrom($redirectFrom)
    {
        $this->redirectFrom = $redirectFrom;
    }

    /**
     * Get redirectFrom
     *
     * @return string 
     */
    public function getRedirectFrom()
    {
        return $this->redirectFrom;
    }

    /**
     * Set redirectTo
     *
     * @param string $redirectTo
     */
    public function setRedirectTo($redirectTo)
    {
        $this->redirectTo = $redirectTo;
    }

    /**
     * Get redirectTo
     *
     * @return string 
     */
    public function getRedirectTo()
    {
        return $this->redirectTo;
    }

    /**
     * Set redirectCode
     *
     * @param string $redirectCode
     */
    public function setRedirectCode($redirectCode)
    {
        $this->redirectCode = $redirectCode;
    }

    /**
     * Get redirectCode
     *
     * @return string 
     */
    public function getRedirectCode()
    {
        return $this->redirectCode;
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