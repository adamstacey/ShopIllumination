<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="redirects")
 * @ORM\HasLifecycleCallbacks()
 */
class Redirect
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
     * @ORM\Column(name="redirect_from", type="text")
     */
    private $redirectFrom;
    
    /**
     * @ORM\Column(name="redirect_to", type="text")
     */
    private $redirectTo;
    
    /**
     * @ORM\Column(name="redirect_code", type="string", length=5)
     */
    private $redirectCode;

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