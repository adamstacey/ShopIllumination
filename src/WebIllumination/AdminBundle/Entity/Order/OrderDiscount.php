<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_discounts")
 * @ORM\HasLifecycleCallbacks()
 */
class OrderDiscount
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\AdminBundle\Entity\Order", inversedBy="discounts")
     */
    private $order;
    
    /**
     * @ORM\Column(name="voucher_code", type="string", length=255)
     */
    private $voucherCode;
    
    /**
     * @ORM\Column(name="gift_voucher_code", type="string", length=255)
     */
    private $giftVoucherCode;
    
    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
        
    /**
     * @ORM\Column(name="discount", type="decimal", precision=12, scale=4)
     */
    private $discount;

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