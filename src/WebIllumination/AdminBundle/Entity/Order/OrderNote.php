<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_notes")
 * @ORM\HasLifecycleCallbacks()
 */
class OrderNote
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="creator", type="string", length=255)
     */
    private $creator;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\AdminBundle\Entity\Order", inversedBy="discounts")
     */
    private $order;
    
    /**
     * @ORM\Column(name="note_type", type="string", length=255)
     */
    private $noteType;
        
    /**
     * @ORM\Column(name="notified", type="boolean")
     */
    private $notified;
    
    /**
     * @ORM\Column(name="note", type="text")
     */
    private $note;

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