<?php
namespace WebIllumination\AdminBundle\Entity;

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
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="object_type", type="string", length="255")
     */
    private $objectType;
	
	/**
     * @ORM\Column(name="object_key", type="string", length="255")
     */
    private $objectKey;
	    
    /**
     * @ORM\Column(name="object_data", type="text")
     */
    private $objectData;
    
    /**
     * @ORM\Column(name="locale", type="string", length="2")
     */
    private $locale;
    
    /**
     * @ORM\Column(name="rebuild", type="integer", length="1")
     */
    private $rebuild;
            
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

	/**
	 * @ORM\prePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\preUpdate
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
     * Set objectKey
     *
     * @param string $objectKey
     */
    public function setObjectKey($objectKey)
    {
        $this->objectKey = $objectKey;
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
     * @param text $objectData
     */
    public function setObjectData($objectData)
    {
        $this->objectData = $objectData;
    }

    /**
     * Get objectData
     *
     * @return text 
     */
    public function getObjectData()
    {
        return $this->objectData;
    }

    /**
     * Set locale
     *
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
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
     * @param integer $rebuild
     */
    public function setRebuild($rebuild)
    {
        $this->rebuild = $rebuild;
    }

    /**
     * Get rebuild
     *
     * @return integer 
     */
    public function getRebuild()
    {
        return $this->rebuild;
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