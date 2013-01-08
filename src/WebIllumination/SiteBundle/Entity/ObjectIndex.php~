<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="object_index")
 * @ORM\HasLifecycleCallbacks()
 */
class ObjectIndex
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="object_type", type="string", length=255)
     */
    private $objectType;
	
	/**
     * @ORM\Column(name="object_key", type="string", length=255)
     */
    private $objectKey;
	    
    /**
     * @ORM\Column(name="object_data", type="text")
     */
    private $objectData;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale = "en_GB";
    
    /**
     * @ORM\Column(name="rebuild", type="boolean")
     */
    private $rebuild;

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
     * Set objectType
     *
     * @param string $objectType
     * @return ObjectIndex
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
     * Set objectKey
     *
     * @param string $objectKey
     * @return ObjectIndex
     */
    public function setObjectKey($objectKey)
    {
        $this->objectKey = $objectKey;
    
        return $this;
    }

    /**
     * Get objectKey
     *
     * @return string 
     */
    public function getObjectKey()
    {
        return $this->objectKey;
    }

    /**
     * Set objectData
     *
     * @param string $objectData
     * @return ObjectIndex
     */
    public function setObjectData($objectData)
    {
        $this->objectData = $objectData;
    
        return $this;
    }

    /**
     * Get objectData
     *
     * @return string 
     */
    public function getObjectData()
    {
        return $this->objectData;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return ObjectIndex
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set rebuild
     *
     * @param boolean $rebuild
     * @return ObjectIndex
     */
    public function setRebuild($rebuild)
    {
        $this->rebuild = $rebuild;
    
        return $this;
    }

    /**
     * Get rebuild
     *
     * @return boolean 
     */
    public function getRebuild()
    {
        return $this->rebuild;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ObjectIndex
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
     * @return ObjectIndex
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