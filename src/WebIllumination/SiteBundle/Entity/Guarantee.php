<?php
namespace WebIllumination\SiteBundle\Entity;

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
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Guarantee\Type")
     * @ORM\JoinColumn(name="guarantee_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Guarantee\Length")
     * @ORM\JoinColumn(name="guarantee_length_id", referencedColumnName="id")
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