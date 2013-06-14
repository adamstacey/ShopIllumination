<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="redirects")
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
     * @ORM\Column(name="secondary_id", type="integer", length=11)
     */
    private $secondaryId;
	
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
     * @return Redirect
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    
        return $this;
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
     * @return Redirect
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
     * Set redirectFrom
     *
     * @param string $redirectFrom
     * @return Redirect
     */
    public function setRedirectFrom($redirectFrom)
    {
        $this->redirectFrom = $redirectFrom;
    
        return $this;
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
     * @return Redirect
     */
    public function setRedirectTo($redirectTo)
    {
        $this->redirectTo = $redirectTo;
    
        return $this;
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
     * @return Redirect
     */
    public function setRedirectCode($redirectCode)
    {
        $this->redirectCode = $redirectCode;
    
        return $this;
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
     * @param \DateTime $createdAt
     * @return Redirect
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
     * @return Redirect
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
     * @return mixed
     */
    public function getSecondaryId()
    {
        return $this->secondaryId;
    }

    /**
     * @param mixed $secondaryId
     */
    public function setSecondaryId($secondaryId)
    {
        $this->secondaryId = $secondaryId;
    }
}