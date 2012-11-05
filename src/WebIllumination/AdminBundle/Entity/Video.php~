<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="video")
 * @ORM\HasLifecycleCallbacks()
 */
class Video
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
     * @ORM\Column(name="display_order", type="integer", length="11")
     */
    private $displayOrder;

    /**
     * @ORM\Column(name="path", type="string", length="255", nullable="TRUE")
     */
    private $path;
            
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
}