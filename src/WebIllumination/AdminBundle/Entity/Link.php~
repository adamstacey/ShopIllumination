<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="link")
 * @ORM\HasLifecycleCallbacks()
 */
class Link
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
   
    /**
     * @ORM\Column(name="object_id", type="integer", length="11")
     */
    private $objectId;
    
     /**
     * @ORM\Column(name="object_type", type="string", length="100")
     */
    private $objectType;
    
     /**
     * @ORM\Column(name="image_type", type="string", length="100")
     */
    private $imageType;
    
    /**
     * @ORM\Column(name="locale", type="string", length="2")
     */
    private $locale;
	
	/**
     * @ORM\Column(name="title", type="string", length="255")
     */
    private $title;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(name="alignment", type="string", length="10")
     */
    private $alignment;
    
    /**
     * @ORM\Column(name="link", type="string", length="255")
     */
    private $link;
    
    /**
     * @ORM\Column(name="default_image", type="integer", length="1")
     */
    private $defaultImage;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length="11")
     */
    private $displayOrder;

    /**
     * @ORM\Column(name="original_path", type="string", length="255", nullable="TRUE")
     */
    private $originalPath;
    
    /**
     * @ORM\Column(name="thumbnail_path", type="string", length="255", nullable="TRUE")
     */
    private $thumbnailPath;
    
    /**
     * @ORM\Column(name="medium_path", type="string", length="255", nullable="TRUE")
     */
    private $mediumPath;
    
    /**
     * @ORM\Column(name="large_path", type="string", length="255", nullable="TRUE")
     */
    private $largePath;
        
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
     * Set imageType
     *
     * @param string $imageType
     */
    public function setImageType($imageType)
    {
        $this->imageType = $imageType;
    }

    /**
     * Get imageType
     *
     * @return string 
     */
    public function getImageType()
    {
        return $this->imageType;
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set alignment
     *
     * @param string $alignment
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;
    }

    /**
     * Get alignment
     *
     * @return string 
     */
    public function getAlignment()
    {
        return $this->alignment;
    }

    /**
     * Set link
     *
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set defaultImage
     *
     * @param integer $defaultImage
     */
    public function setDefaultImage($defaultImage)
    {
        $this->defaultImage = $defaultImage;
    }

    /**
     * Get defaultImage
     *
     * @return integer 
     */
    public function getDefaultImage()
    {
        return $this->defaultImage;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
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
     * Set originalPath
     *
     * @param string $originalPath
     */
    public function setOriginalPath($originalPath)
    {
        $this->originalPath = $originalPath;
    }

    /**
     * Get originalPath
     *
     * @return string 
     */
    public function getOriginalPath()
    {
        return $this->originalPath;
    }

    /**
     * Set thumbnailPath
     *
     * @param string $thumbnailPath
     */
    public function setThumbnailPath($thumbnailPath)
    {
        $this->thumbnailPath = $thumbnailPath;
    }

    /**
     * Get thumbnailPath
     *
     * @return string 
     */
    public function getThumbnailPath()
    {
        return $this->thumbnailPath;
    }
    
    /**
     * Get thumbnailWidth
     *
     * @return string 
     */
    public function getThumbnailWidth()
    {
    	list($width, $height) = getimagesize(__DIR__.'/../../../../web'.$this->thumbnailPath);
        return $width;
    }
    
    /**
     * Get thumbnailHeight
     *
     * @return string 
     */
    public function getThumbnailHeight()
    {
    	list($width, $height) = getimagesize(__DIR__.'/../../../../web'.$this->thumbnailPath);
        return $height;
    }

    /**
     * Set mediumPath
     *
     * @param string $mediumPath
     */
    public function setMediumPath($mediumPath)
    {
        $this->mediumPath = $mediumPath;
    }

    /**
     * Get mediumPath
     *
     * @return string 
     */
    public function getMediumPath()
    {
        return $this->mediumPath;
    }
    
    /**
     * Get mediumWidth
     *
     * @return string 
     */
    public function getMediumWidth()
    {
    	list($width, $height) = getimagesize(__DIR__.'/../../../../web'.$this->mediumPath);
        return $width;
    }
    
    /**
     * Get mediumHeight
     *
     * @return string 
     */
    public function getMediumHeight()
    {
    	list($width, $height) = getimagesize(__DIR__.'/../../../../web'.$this->mediumPath);
        return $height;
    }

    /**
     * Set largePath
     *
     * @param string $largePath
     */
    public function setLargePath($largePath)
    {
        $this->largePath = $largePath;
    }

    /**
     * Get largePath
     *
     * @return string 
     */
    public function getLargePath()
    {
        return $this->largePath;
    }
    
    /**
     * Get largeWidth
     *
     * @return string 
     */
    public function getLargeWidth()
    {
    	list($width, $height) = getimagesize(__DIR__.'/../../../../web'.$this->largePath);
        return $width;
    }
    
    /**
     * Get largeHeight
     *
     * @return string 
     */
    public function getLargeHeight()
    {
    	list($width, $height) = getimagesize(__DIR__.'/../../../../web'.$this->largePath);
        return $height;
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