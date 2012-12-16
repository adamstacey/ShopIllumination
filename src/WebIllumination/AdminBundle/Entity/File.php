<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="files")
 * @ORM\HasLifecycleCallbacks()
 */
class File
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="object_type", type="string", length=100)
     */
    private $objectType;
    
    /**
     * @ORM\Column(name="object_id", type="integer", length=11)
     */
    private $objectId;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;
	
	/**
     * @ORM\Column(name="display_name", type="string", length=255)
     */
    private $displayName;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;
    
    /**
     * @ORM\Column(name="file_type", type="string", length=4)
     */
    private $fileType;
    
    /**
     * @ORM\Column(name="file_size", type="string", length=255)
     */
    private $fileSize;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
     */
    private $displayOrder;

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
}