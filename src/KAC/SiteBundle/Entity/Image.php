<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContext;

/**
 * @ORM\Entity
 * @ORM\Table(name="images")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isImageTypeValid"})
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
   
    /**
     * @ORM\Column(name="object_id", type="integer", length=11, nullable=true)
     */
    private $objectId;
    
     /**
     * @ORM\Column(name="object_type", type="string", length=100, nullable=true)
     */
    private $objectType;
    
     /**
     * @ORM\Column(name="image_type", type="string", length=100, nullable=true)
     */
    private $imageType;

    /**
     * @ORM\Column(name="locale", type="string", length=5)
     */
    private $locale = "en_GB";
	
	/**
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(name="alignment", type="string", length=10, nullable=true)
     */
    private $alignment;
    
    /**
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
     */
    private $displayOrder = 0;

    /**
     * @ORM\Column(name="original_path", type="string", length=255, nullable=true)
     */
    private $originalPath;
    
    /**
     * @ORM\Column(name="public_path", type="string", length=255, nullable=true, nullable=true)
     */
    private $publicPath;

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
     * @var UploadedFile
     * @Assert\NotNull
     * @Assert\File(maxSize="6000000")
     */
    private $file = null;
    private $filesForRemoval = array();

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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Image
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
     * @return Image
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
     * Set pubpic path
     *
     * @param string $publicPath
     * @return Image
     */
    public function setPublicPath($publicPath)
    {
        $this->publicPath = $publicPath;
    
        return $this;
    }

    /**
     * Get public path
     *
     * @return string 
     */
    public function getPublicPath()
    {
        return $this->publicPath;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Image
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
     * @return Image
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
     * @return \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    public function preUpload()
    {
        if (null !== $this->file) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->originalPath = $this->getUploadDir() . '/' . $filename.'.'.$this->file->guessExtension();
        }
    }

    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $this->file->move($this->getUploadPath() . $this->getUploadDir(), basename($this->originalPath));

        $this->file = null;
    }

    public function storeFilenameForRemove()
    {
        $this->filesForRemoval = array();
        $this->filesForRemoval[] = $this->getUploadPath() . '/' . $this->getOriginalPath();
        if($this->getPublicPath() !== null && $this->getPublicPath() !== "") {
            $this->filesForRemoval[] = $this->getUploadPath() . '/' . $this->getPublicPath();
        }
    }

    public function removeUpload()
    {
        foreach($this->filesForRemoval as $fileForRemoval) {
            unlink($fileForRemoval);
        }
    }

    public function getUploadPath()
    {
        return __DIR__.'/../../../../web';
    }

    public function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '/uploads/images';
    }

    public function isImageTypeValid(ExecutionContext $context)
    {
            if(!in_array($this->getImageType(), array("product", "gallery"))) {
                    $context->addViolationAtSubPath("imageType", "That image type is invalid");
            }
    }
}