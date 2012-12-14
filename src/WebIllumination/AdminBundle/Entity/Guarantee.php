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
     * @ManyToOne(targetEntity="WebIlluminationAdminBundle:Guarantee/Type")
     */
    private $type;

    /**
     * @ManyToOne(targetEntity="WebIlluminationAdminBundle:Guarantee/Length")
     */
    private $length;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
}