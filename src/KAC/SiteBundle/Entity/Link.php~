<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="links")
 * @ORM\HasLifecycleCallbacks()
 */
class Link
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
     * @ORM\Column(name="image_type", type="string", length=100)
     */
    private $imageType;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale = "en_GB";
	
	/**
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(name="alignment", type="string", length=10)
     */
    private $alignment;
    
    /**
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;
    
    /**
     * @ORM\Column(name="default_image", type="boolean")
     */
    private $defaultImage;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
     */
    private $displayOrder;

    /**
     * @ORM\Column(name="original_path", type="string", length=255, nullable=true)
     */
    private $originalPath;
    
    /**
     * @ORM\Column(name="thumbnail_path", type="string", length=255, nullable=true)
     */
    private $thumbnailPath;
    
    /**
     * @ORM\Column(name="medium_path", type="string", length=255, nullable=true)
     */
    private $mediumPath;
    
    /**
     * @ORM\Column(name="large_path", type="string", length=255, nullable=true)
     */
    private $largePath;

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
     * @return Link
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
     * @return Link
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
     * Set imageType
     *
     * @param string $imageType
     * @return Link
     */
    public function setImageType($imageType)
    {
        $this->imageType = $imageType;
    
        return $this;
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
     * @return Link
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
     * Set title
     *
     * @param string $title
     * @return Link
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
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
     * @param string $description
     * @return Link
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set alignment
     *
     * @param string $alignment
     * @return Link
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;
    
        return $this;
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
     * @return Link
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
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
     * @param boolean $defaultImage
     * @return Link
     */
    public function setDefaultImage($defaultImage)
    {
        $this->defaultImage = $defaultImage;
    
        return $this;
    }

    /**
     * Get defaultImage
     *
     * @return boolean 
     */
    public function getDefaultImage()
    {
        return $this->defaultImage;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Link
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
    
        return $this;
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
     * @return Link
     */
    public function setOriginalPath($originalPath)
    {
        $this->originalPath = $originalPath;
    
        return $this;
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
     * @return Link
     */
    public function setThumbnailPath($thumbnailPath)
    {
        $this->thumbnailPath = $thumbnailPath;
    
        return $this;
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
     * Set mediumPath
     *
     * @param string $mediumPath
     * @return Link
     */
    public function setMediumPath($mediumPath)
    {
        $this->mediumPath = $mediumPath;
    
        return $this;
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
     * Set largePath
     *
     * @param string $largePath
     * @return Link
     */
    public function setLargePath($largePath)
    {
        $this->largePath = $largePath;
    
        return $this;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Link
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
     * @return Link
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