<?php
namespace WebIllumination\AdminBundle\Entity;

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
    private $locale;
	
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
}