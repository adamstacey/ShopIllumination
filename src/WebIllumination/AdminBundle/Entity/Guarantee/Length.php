<?php
namespace WebIllumination\AdminBundle\Entity\Guarantee;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="guarantee_lengths")
 * @ORM\HasLifecycleCallbacks()
 */
class Length
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="display_name", type="string", length=255)
     */
    private $displayName;
	
	/**
     * @ORM\Column(name="guarantee_length", type="string", length=255)
     */
    private $guaranteeLength;
    
    /**
     * @ORM\Column(name="guarantee_title", type="string", length=255)
     */
    private $guaranteeTitle;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;
    
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