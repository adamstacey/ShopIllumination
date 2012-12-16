<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="object_indexes")
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
    private $locale;
    
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
}