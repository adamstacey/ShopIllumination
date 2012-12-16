<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_donations")
 * @ORM\HasLifecycleCallbacks()
 */
class OrderDonation
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\AdminBundle\Entity\Order", inversedBy="donations")
     */
    private $orderId;
        
    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
        
    /**
     * @ORM\Column(name="donation", type="decimal", precision=12, scale=4)
     */
    private $donation;

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