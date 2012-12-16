<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="routing")
 * @ORM\HasLifecycleCallbacks()
 */
class Routing
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
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;
    
	/**
     * @ORM\Column(name="url", type="text")
     */
    private $url;

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