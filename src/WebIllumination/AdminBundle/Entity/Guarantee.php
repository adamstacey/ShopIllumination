<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="guarantees")
 * @ORM\HasLifecycleCallbacks()
 */
class Guarantee
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
     * @ORM\ManyToOne(targetEntity="WebIlluminationAdminBundle:Guarantee/Type")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="WebIlluminationAdminBundle:Guarantee/Length")
     */
    private $length;

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